@extends('master')
@section('content')
<div class="col-sm-offset-4 col-sm-4">
    <div class="form-group"><h2>Login</h2></div>
    <form action="{{route('auth.login')}}" method="post">
        {!! csrf_field() !!}

        <div class="form-group">
            <label class="control-label sr-only" for="email">E-Mail</label>
            <input type="email" id="email" name="email" placeholder="E-Mail" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label class="control-label sr-only" for="password">Password</label>
            <input type="password" id="password" value="" name="password" placeholder="Password" class="form-control">
        </div>
        <div class="checkbox form-group">
            <label>
                <input type="checkbox" value="1" name="remember" id="remember">
                Remember me
            </label>
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="form-control btn btn-primary">
        </div>
    </form>
</div>
@endsection
@section('title')
    Login
@endsection