@extends('master')
@section('content')
    <div class="row">
        {{--<div class="col-sm-3">--}}
            {{--<form id="search-form">--}}
                {{--<div class="form-group">--}}
                    {{--<label for="search-box">Search</label>--}}
                    {{--<input id="search-box" class="form-control" type="search">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<input type="submit" value="search" class="form-control btn btn-primary">--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
        {{--<div class="col-sm-6">--}}
            {{--<button class="btn btn-primary">Upload</button>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3">--}}
            {{--{{$tag}}--}}
            {{--<form id="gallerie-upload-form" action="{{route('gallerie')}}" method="post" enctype="multipart/form-data">--}}
                {{--{!! csrf_field() !!}--}}
                {{--<div class="form-group">--}}
                    {{--<label for="images">Images</label>--}}
                    {{--<input id="images" name="images[]" type="file" multiple>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<input type="submit" value="Upload" class="form-control btn btn-primary">--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    </div>
@endsection
@section('title')
    Gallerie
@endsection