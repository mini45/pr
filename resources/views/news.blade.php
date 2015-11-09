@extends('master')
@section('content')
    <div class="news-site">
        <div class="row">
            <h1>News</h1>
        </div>
        <div class="row">
            <div class="new-article">
                <form action="{{route('news.save')}}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label>Überschrift</label>
                        <input required class="form-control" name="heading" type="text">
                    </div>
                    <div class="form-group">
                        <label>Artikel</label>
                    <textarea required name="content" class="form-control">
                    </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary form-control" value="propagieren">
                    </div>
                </form>
            </div>
        </div>

        @foreach($news as $new)
            <div class="row">
                <div class="news-container">
                    <div class="autor-container">
                        <div class="autor">{{$new['author']}} schrieb am {{$new['date']}} um {{$new['time']}}</div>
                    </div>
                    <div class="heading">
                        <h2>{{$new['heading']}}<h2>
                    </div>
                    <div class="content-container">
                        {{$new['content']}}
                    </div>
                    <div class="slide-trigger">
                        <h3><span class="glyphicon glyphicon-plus-sign"></span></h3>
                    </div>
                    <div class="comment-section" style="display: none">
                    @if(!empty($new['comments']->first()))
                        <div class="comments">
                            @foreach($new['comments'] as $comment)
                                <div class="comment-container">
                                    <div class="comment-author">{{$comment->author()->first()->name}}</div>
                                    <div class="comment-content">{{$comment->comment}}</div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    @endif
                    <div class="add-comment">
                        <form action="" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Kommentar</label>
                                <textarea required name="comment" class="form-control">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control" value="kommentieren">
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('title')
    News
@endsection
@section('scripts')
    @parent
    <script src="{{ url('js/news.min.js') }}"></script>
@endsection