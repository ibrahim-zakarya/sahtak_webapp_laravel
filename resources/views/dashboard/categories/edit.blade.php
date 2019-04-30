@extends('dashboard.master')
@section('categoriesActive')
    active
@endsection
@section('content')

@section('title')
    Update category
@endsection
<form method="post" action="/category/{{$category->id}}/edit">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    @include('layouts.errors')
</form>
@endsection