@extends('dashboard.master')
@section('consultationsActive')
    active
@endsection
@section('content')

@section('title')
    Consultations
@endsection


<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Create date</th>
        <th scope="col">Answer</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cons as $con)
        <tr>
            <th scope="row">{{ $con->id }}</th>
            <td>{{ $con->title }}</td>
            <td>{{ $con->body }}</td>

            <td>{{$con->created_at}}</td>
            <td>
                <a  href="/consultations/{{$con->id}}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection