@extends('master')
@section('content')
    <div class="container">
        <div id='calendar'></div>
    </div>
    <div class="modal fade" id="addEvent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Event hinzufügen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label sr-only" for="title">Titel</label>
                        <input type="text" id="title" value="" name="title" placeholder="Titel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label sr-only" for="description">Beschreibung</label>
                        <textarea id="description" value="" name="description" placeholder="Beschreibung" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="btn-save-event" type="button" class="btn btn-primary">Save Event</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="showEvent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="description">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
    {!! HTML::script('js/moment.min.js') !!}
    {!! HTML::script('js/fullcalendar.js') !!}
    {!! HTML::script('js/event.min.js') !!}
@endsection