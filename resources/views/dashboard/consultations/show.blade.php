@extends('dashboard.master')

@section('consultationsActive')
    active
@endsection
@section('content')

@section('title')
    Answer
@endsection
<form method="post" action="/consultations/{{$consultation->id}}/answer">
    {{ csrf_field() }}
    <h4> User Info:</h4>
    <h6> Name: {{$consultation->user->name}}</h6>
    <h6> Age: {{$consultation->user->age}}</h6>
    <h6> Gender: {{$consultation->user->gender}}</h6>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$consultation->title}}">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" name="body">{{$consultation->body}}</textarea>
    </div>

    <div class="form-group">
        <label for="answer">Answer</label>
        <textarea class="form-control" name="answer"></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    @include('layouts.errors')
</form>


@endsection