@extends('master')
@section('content')
    <div class="container">
        <div id='calendar'></div>
    </div>
@endsection
@section('title')
    Events
@endsection
@section('styles')
    @parent
    {!! HTML::style('css/fullcalendar.min.css') !!}
@endsection
@section('scripts')
    @parent
    {!! HTML::script('js/event.min.js') !!}
    {!! HTML::script('js/moment.min.js') !!}
    {!! HTML::script('js/fullcalendar.js') !!}
@endsection