@extends('layouts.master')
@section('content')
    <div class="col-sm-8">
        <h1>Register</h1>

        <form action="/register" method="post" style="margin-bottom: 10rem;">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="email">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>

            <div class="form-group">
                <label for="email">Age:</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="custom-select" name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password confirmation:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LeoA4IUAAAAAGetMmT_ZkIExqtTJ_JQNHQ7ARxG"></div>
            </div>



            <div class="form-group">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>

            @include('layouts.errors')
        </form>
    </div>
    @endsection