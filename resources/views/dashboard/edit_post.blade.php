@extends('dashboard.master')

@section('postsActive')
    active
@endsection
@section('content')

        @section('title')
            Edit post
        @endsection
        <form method="post" action="/posts/{{$post->id}}/edit">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body">{{$post->body}}</textarea>
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="image">
                    <label class="custom-file-label" for="image">Choose post image</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="custom-select" name="category" >
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($post->category->id == $category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            @include('layouts.errors')
        </form>


@endsection