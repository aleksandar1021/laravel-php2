<div id="wrapper">
    <!----->
    <nav class="navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1> <a class="navbar-brand" href="{{route("/")}}">GLOBAL FOOD</a></h1>
        </div>
        <div class=" border-bottom">
            <div class="full-left">
{{--                <section class="full-top">--}}
{{--                    <button id="toggle"><i class="fa fa-arrows-alt"></i></button>--}}
{{--                </section>--}}
{{--                <form class=" navbar-left-right">--}}
{{--                    <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">--}}
{{--                    <input type="submit" value="" class="fa fa-search">--}}
{{--                </form>--}}
                <div class="clearfix"> </div>
            </div>


            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="drop-men" >
                <ul class=" nav_1">
                        <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">{{session()->get('user')->email}}</span><img style="width: 60px" src="{{asset("images/chefs/".session()->get('user')->image)}}"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{route("logout")}}">SIGNOUT</a>&nbsp;&nbsp;
                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="clearfix">

            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="{{route("adminPage")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon fa fa-info-circle"></i><span class="nav-label">Activities</span> </a>
                        </li>

                        <li>
                            <a href="{{route("tablesAdmin")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i><span class="nav-label">Tables</span> </a>
                        </li>

                        <li>
                            <a href="{{route("levels")}}" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Premium levels</span> </a>
                        </li>

                        <li>
                            <a href="{{route("numbers")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon fa fa-wheelchair"></i><span class="nav-label">Numbers of chairs</span> </a>
                        </li>

                        <li>
                            <a href="{{route("galleries")}}" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i><span class="nav-label">Gallery</span> </a>
                        </li>

                        <li>
                            <a href="{{route("chefs")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon fa fa-user-plus"></i><span class="nav-label">Our team</span> </a>
                        </li>

                        <li>
                            <a href="{{route("navigations")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon fa fa-bars"></i><span class="nav-label">Navigation</span> </a>
                        </li>

                        <li>
                            <a href="{{route("messages")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon fa fa-paper-plane"></i><span class="nav-label">Messages</span> </a>
                        </li>

                        <li>
                            <a href="{{route("comments")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon fa fa-comments-o"></i><span class="nav-label">Comments</span> </a>
                        </li>

                        <li>
                            <a href="{{route("newsletter")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon fa fa-inbox"></i><span class="nav-label">Newsletter</span> </a>
                        </li>

                        <li>
                            <a href="{{route("categories")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon fa fa-apple"></i><span class="nav-label">Meal Categories</span> </a>
                        </li>

                        <li>
                            <a href="{{route("networks")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon fa fa-internet-explorer"></i><span class="nav-label">Social Networks</span> </a>
                        </li>

                        <li>
                            <a href="{{route("users")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon fa fa-users"></i><span class="nav-label">Users</span> </a>
                        </li>

                        <li>
                            <a href="{{route("homePage")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon fa fa-home"></i><span class="nav-label">Home Page</span> </a>
                        </li>

                        <li>
                            <a href="{{route("reservationsAdmin")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon  fa fa-book" aria-hidden="true"></i><span class="nav-label">Reservations</span> </a>
                        </li>

                        <li>
                            <a href="{{route("roles")}}" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon  fa fa-cubes" aria-hidden="true"></i><span class="nav-label">Roles</span> </a>
                        </li>

                    </ul>
                </div>
            </div>
    </nav>
