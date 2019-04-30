<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Input as Input;

use App\Repositories\Posts;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except('index', 'show');
    }

    public function index(Post $posts) {
//        $posts = $posts->all()->reverse();
        $posts = Post::orderBy('views', 'DESC')->get();
        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function list(Post $posts) {
        $posts = $posts->all()->reverse();

        return view('dashboard.posts', compact('posts'));
    }

    public function show(Post $post) {
        $categories = Category::all();
        $post->views = $post->views + 1;
        $post->save();
        return view('posts.show', compact('post', 'categories'));
    }

    public function edit(Post $post) {
        $categories = Category::all();
        return view('dashboard.edit_post', compact('post', 'categories'));
    }

    public function save(Post $post) {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        $data = request()->all();
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->category_id = $data['category'];
        $post->save();
        return redirect('/posts');
    }

    public function create() {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    public function store(Request $request) {
//        dd($request);
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'category'  => 'required'
        ]);
        $getimageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $getimageName);

        $data = request()->all();

        $post = new Post(request(['title', 'body', 'image']));
        $post->category_id = $data['category'];
        $post->image = $getimageName;

        auth()->user()->publish($post);
        return redirect('/posts');
    }

    public function delete(Post $post) {
        $post = $post->delete();
    }
}
