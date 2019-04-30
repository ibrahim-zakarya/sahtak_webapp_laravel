@extends('layouts.master')
@section('content')
    <div class="col-sm-auto">
        <h1>My consultations</h1>
        @foreach($cons as $con)
            <div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Title:</strong>
                            {{ $con->title }}
{{--                            {{ $con->created_at->diffForHumans() }}--}}
                        <br>
                        <hr>
                        <strong> Body:</strong> {{$con->body}}<br>
                        <hr>

                        @if($con->answered == 1)
                            <strong>Answered:</strong>  yes <br>

                        <strong>Answer:</strong> {{ $con->answer }}
                            @else
                            <strong>Answered:</strong>  not yet
                        @endif
                    </li>
                </ul>
            </div>
            <hr>
        @endforeach

    </div>
@endsection