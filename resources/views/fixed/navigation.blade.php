<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            @foreach($menu as $m)
                @if(session()->has('user'))
                    @if(session()->get('user')->id_role == 1)
                        @if($m->name != "Admin")
                            <li><a class="@if(request()->routeIs($m->href)) active @endif list-border" href="{{$m->href}}">{{$m->name}}</a></li>
                        @endif
                    @elseif(session()->get('user')->id_role == 2)
                        <li><a class="@if(request()->routeIs($m->href)) active @endif list-border" href="{{$m->href}}">{{$m->name}}</a></li>
                    @endif
                @elseif($m->name == "Reservation" || $m->name == "Admin" || $m->name == "Checkout" || $m->name == "Reservations" || $m->name == "Account")
                    @continue
                @else
                    <li><a class="@if(request()->routeIs($m->href)) active @endif list-border" href="{{$m->href}}">{{$m->name}}</a></li>
                @endif
            @endforeach
        </ul>
        <div class="clearfix"> </div>
    </div>
</nav>
