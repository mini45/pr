@extends('master')
@section('content')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="form-group"><h2>Profil</h2></div>
        <form action="{{route('profile')}}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group">
                <label class="control-label sr-only" for="name">Username</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <label class="control-label sr-only" for="email">E-Mail</label>
                <input type="email" id="email" name="email" placeholder="E-Mail" class="form-control" value="{{ Auth::user()->email }}">
            </div>
            <div class="form-group">
                <label class="control-label sr-only" for="old-password">Password</label>
                <input type="password" id="old-password" value="" name="old-password" placeholder="Old Password" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label sr-only" for="new-password">Password</label>
                <input type="password" id="new-password" value="" name="new-password" placeholder="New Password" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label sr-only" for="password-control">Password</label>
                <input type="password" id="password-control" value="" name="password-control" placeholder="New Password" class="form-control">
            </div>
            <div class="form-group">
                <label for="pic">Profile Image</label>
                <input name="pic" type="file">
            </div>
            <div class="form-group">
                <input type="submit" value="Speichern" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
@endsection
@section('title')
    Profil
@endsection