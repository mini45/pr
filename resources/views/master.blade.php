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
    {!! HTML::script('js/jquery.min.js') !!}
    {!! HTML::script('js/jquery-ui.min.js') !!}
    {!! HTML::script('js/bootstrap.min.js') !!}
</head>
<body>
@include('navigation')

@include('flash::message')
<div class="container">
    @yield('content')
</div>



</body>
@section('scripts')
    {!! HTML::script('js/app.min.js') !!}
    <script>
        $(function () {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });
        });

    </script>

@show
</html>