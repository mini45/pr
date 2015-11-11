@extends('master')
@section('content')
    <div id="gallerie">

        <div id="nanoGallery3">
            @foreach($images as $image)
                <a href="gallerie/picture/{{$image->path}}" data-ngthumb="gallerie/picture/{{$image->path}}" data-ngdesc="{{$image->getDescription()}}">{{$image->id}}</a>
            @endforeach
        </div>

        {{--@foreach(array_chunk($images->getCollection()->all(), 6) as $row)--}}
            {{--<div class="row">--}}
                {{--@foreach($row as $item)--}}
                    {{--<div class="col-sm-1 col-md-2">--}}
                        {{--<div class="thumbnail" data-id="{{$item->id}}">--}}
                            {{--<img src="gallerie/picture/{{$item->path}}" alt="">--}}
                            {{--<div class="caption">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--@endforeach--}}

            {{--{!! $images->render() !!}--}}

        <aside>
            <section>
                <h2><span aria-hidden="true" class="glyphicon glyphicon-upload"></span></h2>
            </section>
        </aside>

        <div class="modal fade" id="showUploadForm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Bilder hochladen</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array('url'=>route('gallerie.upload'),'method'=>'POST','files'=>true)) !!}
                        {!! Form::file('images[]',array('multiple'=>true)) !!}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Submit',array('class'=>'btn btn-primary')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


    </div>

@endsection
@section('title')
    Gallerie
@endsection
@section('scripts')
    @parent
    <script type="text/javascript" src="js/jquery.nanogallery.min.js"></script>
    <script>

        $(document).ready(function () {
            $("#nanoGallery3").nanoGallery({
                itemsBaseURL:'',
                thumbnailHeight: '150',
                thumbnailHoverEffect: 'slideUp,borderLighter',
                viewerToolbar: {
                    autoMinimize: 0,
                    standard: 'minimizeButton ,previousButton,pageCounter,nextButton,playButton,closeButton, fullscreenButton,label,custom2'
                },
                fnImgToolbarCustInit: myImgToolbarCustInit,
                fnImgToolbarCustDisplay: myImgToolbarCustDisplay,
                fnImgToolbarCustClick: myImgToolbarCustClick
            });

            function myImgToolbarCustInit(elementName) {//To customize the toolbar (custom icons and elements) on image display.                 //Called once on toolbar building to define the specified custom elements
                if (elementName == 'custom2') {
                    return '<span class="glyphicon glyphicon-plus"></span>';
                }
            }

            function myImgToolbarCustDisplay($elements, item, data) {//Called on each image display. Called once for all image toolbar custom icons and elements.
                if (item.customData.myCounter == undefined) {
                    item.customData.myCounter = 0;
                }
                // second custom element
                $elements.eq(1).html('photo ID: ' + item.GetID() + '<br>Clicks: ' + item.customData.myCounter );
            }

            function myImgToolbarCustClick(elementName, $element, item, data) {//Fired on click event on image toolbar custom icon or element.
                switch (elementName) {
                    case 'custom2':

                            $element.html('<input id="newTag" type="text"/><button id="btn-send-tag">send</button>');
                            $('#newTag').focus();
                            $('#btn-send-tag').on('click',function(){
//                                console.log(item);
                                var arr = {};
                                arr['id'] = item.title;
                                arr['tag']= $('#newTag').val();
//                                console.log(arr);
                                $.ajax({
                                    url: 'makeNewTag?data='+JSON.stringify(arr),
                                    error: function() {
                                        $element.html('<span class="glyphicon glyphicon-plus"></span>');
                                    },
                                    success: function(data) {
                                        $element.html('<span class="glyphicon glyphicon-plus"></span>');
                                    },
                                    type: 'GET',
                                });
                            });
                        break;
                }
            }



        });

        var showUploadFormModal = $('#showUploadForm');

        $('.glyphicon-upload').on('click',function(){
            showUploadFormModal.modal('toggle');
        });




    </script>
@endsection
@section('styles')
    @parent
    <link href="css/nanogallery.min.css" rel="stylesheet" type="text/css">
@endsection