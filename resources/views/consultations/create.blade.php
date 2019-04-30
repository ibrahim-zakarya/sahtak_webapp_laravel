@extends('layouts.master')
@section('content')
    <div class="col-sm-8">
        <h1>Send us a consultation</h1>

        <form action="/consultation" method="post" style="margin-bottom: 10rem;">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body"></textarea>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LeoA4IUAAAAAGetMmT_ZkIExqtTJ_JQNHQ7ARxG"></div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Send</button>
            </div>

            @include('layouts.errors')
        </form>
    </div>
@endsection