<div class="banner">
    <div class="header">
        <div class="container">
            <div class="header-left">
                <div class="w3layouts-logo">
                    <h1>
                        <a href="/">Global <span>Food</span></a>
                    </h1>
                </div>
            </div>
            <div class="header-right ssp">
                @if(session()->has("user"))
                    <a class="pssppa" href="{{route("logout")}}"><p class="psspp">Logout</p></a>
                @else
                    <a class="pssppa" href="{{route("signin")}}"><p class="psspp">SignIn</p></a>
                    <a class="pssppa" href="{{route("signup")}}"><p class="psspp">SignUp</p></a>
                @endif


                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Gavrila Principa 2, Belgrade</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="top-nav">
                @include("fixed.navigation")
            </div>
            <!-- w3-banner -->
            <div class="w3-banner">
                <div class="w3layouts-phone">
                    <h2 class="hh2" class="phoneNumber">@yield("PhoneNumberOrPage")</h2>
                    @yield("Icon")
                    <p>@yield("Heading1")</p>
                    <h3 class="hh1">@yield("Heading2")</h3>
                </div>
            </div>
            <!-- //w3-banner -->
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modalContent"></p>
        </div>

    </div>
</div>
