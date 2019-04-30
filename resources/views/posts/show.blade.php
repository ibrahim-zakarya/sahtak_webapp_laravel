@extends ('layouts.master')

@section ('content')
    <div class="col-md-8 blog-main">
        <img  onclick="goToPost({{$post->id}})"  data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text={{ $post->title }}"
              alt="Thumbnail [100%x225]" style="height: 25rem;" src="{{url('/') }}/images/{{$post->image}}"
              data-holder-rendered="true">
        <h1>{{ $post->title }}</h1>
        {{ $post->body }}
    </div>
    <hr>
    <h5>Comments:</h5>
    @foreach($post->comments as $comment)
        <div>
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>
                        {{ $comment->created_at->diffForHumans() }}
                    </strong>
                    {{ $comment->body }}
                </li>
            </ul>
        </div>
    @endforeach
    <hr>
    <div class="card" style="margin-bottom: 10rem;
    padding: 10px;">
        <div class="card-block">
            @if(Auth::check())
            <form method="POST" action="/posts/{{ $post->id }}/comments" >
                {{--{{ method_field('POST') }}--}}
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" cols="20" rows="4" class="form-control" placeholder="Add your comment here."></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add comment</button>
                </div>

            </form>
                @else
                <p>Please <a href="/login">login </a>to comment</p>
            @endif
        </div>
    </div>
@endsection