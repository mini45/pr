<nav class="navbar navbar-default navbar-fixed-top">

    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">PR</a>
        </div>
        @if(Auth::check())
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{setActive(route('news'))}}"><a href="{{route('news')}}">News</a></li>
                <li class="{{setActive(route('events'))}}"><a href="{{route('events')}}">Events</a></li>
                <li class="{{setActive(route('finanzen'))}}"><a href="{{route('finanzen')}}">Finanzen</a></li>
                <li class="{{setActive(route('gallerie'))}}"><a href="{{route('gallerie')}}">Gallerie</a></li>
                <li class="{{setActive(route('vote'))}}"><a href="{{route('vote')}}">Vote</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(!empty(Auth::user()->thumbnail))
                    <img src="thumbnails/{{Auth::user()->thumbnail}}" class="img-circle">
                @endif
                <li><a href="{{route('profile')}}">{{Auth::user()->name}}</a></li>
                <li><a href="{{route('logout')}}">Logout</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
        @endif
    </div><!-- /.container-fluid -->

</nav>