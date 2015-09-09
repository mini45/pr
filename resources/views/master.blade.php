<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    @section('styles')
        {!! HTML::style('css/app.css') !!}
        {!! HTML::style('css/jquery-ui.min.css') !!}
    @show
</head>
<body>
@include('navigation')

@include('flash::message')
<div class="container">
    @yield('content')
</div>


@section('scripts')
    {!! HTML::script('js/jquery.min.js') !!}
    {!! HTML::script('js/jquery-ui.min.js') !!}
    {!! HTML::script('js/bootstrap.min.js') !!}
    {!! HTML::script('js/app.min.js') !!}
@show
</body>
</html>