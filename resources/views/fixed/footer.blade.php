<div class="footer">
    <div class="container">
        <div class="agile-footer-grids">
            <div class="col-md-4 agile-footer-grid">
                <h4>History of Us</h4>
                <p>Global Food takes diners on a worldwide gastronomic adventure, showcasing a rich tapestry of flavors and culinary traditions. <span>Global Food takes diners on a worldwide gastronomic adventure, showcasing a rich tapestry of flavors and culinary traditions.</span></p>
            </div>
            <div class="col-md-4 agile-footer-grid foot1">
                <h4>Events</h4>
                <ul>
                    <li class="foot1">12th Aug -<a href="">Exotic Eats</a></li>
                    <li>10th Sept -<a href="">Bold Flavors</a></li>
                    <li>24th Sept -<a href="">Global Feast</a></li>
                    <li>17th Oct -<a href="">Taste Adventure</a></li>
                    <li>09th Dec -<a href="">Community Cuisine</a></li>
                </ul>
            </div>
            <div class="col-md-4 agile-footer-grid">
                <h4 class="foot2">Navigation</h4>
                <ul class="foot2">
                    @foreach($menu as $m)
                            @if(session()->has('user'))
                                @if(session()->get('user')->id_role == 1)
                                    @if($m->name != "Admin")
                                        <li><a class="@if(request()->routeIs($m->href)) active @endif list-border text" href="{{$m->href}}">{{$m->name}}</a></li>
                                    @endif
                                @elseif(session()->get('user')->id_role == 2)
                                    <li><a class="@if(request()->routeIs($m->href)) active @endif list-border text" href="{{$m->href}}">{{$m->name}}</a></li>
                                @endif
                            @elseif($m->name == "Reservation" || $m->name == "Admin" || $m->name == "Checkout" || $m->name == "Reservations" || $m->name == "Account")
                                @continue
                            @else
                                <li><a class="@if(request()->routeIs($m->href)) active @endif list-border text" href="{{$m->href}}">{{$m->name}}</a></li>
                            @endif
                    @endforeach

                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //footer -->
<!-- copyright -->
<div class="agileits-w3layouts-copyright">
    <div class="container">
        <p>© All rights reserved | Design by <a href="{{route("author")}}">Aleksandar Kandic</a></p>
    </div>
</div>
<!-- //copyright -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

<!-- //here ends scrolling icon -->
<script src="{{asset("js/owl.carousel.js")}}"></script>
<script src="{{asset("js/jarallax.js")}}"></script>
<script src="{{asset("js/main.js")}}"></script>
