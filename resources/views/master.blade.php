<html>
<head>
    <title>App Name - @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('styles')
        {!! HTML::style('css/app.css') !!}
        {!! HTML::style('css/jquery-ui.min.css') !!}
    @show
</head>
<body>
@include('navigation')

@include('flash::message')
@yield('content')

@section('scripts')
    {!! HTML::script('js/jquery.min.js') !!}
    {!! HTML::script('js/jquery-ui.min.js') !!}
    {!! HTML::script('js/bootstrap.min.js') !!}
    {!! HTML::script('js/app.min.js') !!}
@show
</body>
</html>