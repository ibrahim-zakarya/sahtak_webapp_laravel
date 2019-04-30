<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Consultation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $posts = Post::all()->count();
        $users = User::all()->count();
        $cons = Consultation::all()->where('answered', '=', 1)->count();
        $ucons = Consultation::all()->where('answered', '=', 0)->count();
        return view('dashboard.index', compact('posts', 'users', 'cons', 'ucons'));
    }
}
