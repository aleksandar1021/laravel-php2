@extends("Layouts.Layout")
@section("title")
    Home
@endsection
@section("PhoneNumberOrPage")
    <i class="fa fa-phone" aria-hidden="true"></i>+381 658255 131
@endsection
@section("Heading1")
    Culinary Delights at GLOBAL FOOD
@endsection

@section("Heading2")
    GLOBAL <span>FOOD</span>
@endsection

@section("Icon")
    <i class="fa fa-cutlery" aria-hidden="true"></i>
@endsection


@section("content")

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds
                autoPlay:true,
                items : 3,
                itemsDesktop : [640,5],
                itemsDesktopSmall : [414,4]

            });

        });
    </script>

    <!-- //banner -->
    <!-- welcome -->

    <div class="about my-5 margin">
        <div class="wthree-heading">
            <h3>About Us Restaurant</h3>
        </div></br></br>
        <div class="container">
            <div class="about-grids">
                <div class="col-md-5 wthree-about-left">
                    <div class="wthree-about-left-info">
                        <img src="{{asset("images/home/".$texts->image)}}" alt="{{$texts->heading}}" />
                    </div>
                </div>
                <div class="col-md-7 agileits-about-right">
                    <h5>{{$texts->heading}}</h5>
                    <p>{{$texts->text1}}
                        <span>{{$texts->text2}}</span>
                    </p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <!-- //about -->
    <div class="jarallax feedback">
        <div class="container">
            <div class="wthree-heading feedback-heading">
                <h3>Customer Feedback</h3>
            </div>
            <div class="agileits-feedback-grids">
                <div id="owl-demo" class="owl-carousel owl-theme">


                    @if(count($comments))
                        @foreach($comments as $com)
                            <div class="item">
                                <div class="feedback-info">
                                    <div class="feedback-top">
                                        <h3 style="color:orange">{{$com->subject}}</h3>
                                        <p>{{$com->message}}</p>
                                    </div>
                                    <div class="feedback-grids">
                                        <div class="feedback-img">
                                            <img src="{{asset("images/chefs/".$com->user->image)}}" alt="">
                                        </div>
                                        <div class="feedback-img-info">
                                            <h5>{{$com->user->name}} {{$com->user->lastname}}</h5>
                                            <p>Feedback</p>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <h1 id="comm">NO COMMENTS</h1>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <!-- leave-comments -->
    @if(session()->has("user"))
        <div id="com">
            <div id="com2" class="w3_leave_comment comWidth">
                <h3>Leave your comment</h3>
                <form action="" method="POST">
                    <input style="color:orange" class="comWidth" type="text" name="subject" id="subject" placeholder="Subject">
                    <textarea style="color:black" class="comWidth" placeholder="Message" id="message" name="message"></textarea>
                    <div style="color:red" id="error"></div>
                    <div id="success" style="color:green"></div>
                    <input type="button" id="comment" value="Send">
                </form>
            </div>
        </div>
    @endif
    <!-- //leave-comments -->

    <!-- team -->
    <div class="team">
        <div class="container">
            <div class="wthree-heading">
                <h3>Our Chefs</h3>
            </div>
            <div class="team-grids">
                <!-- Bottom to top-->


                @foreach($chefs as $c)
                    <div class="col-sm-4 team-grid">
                        <div class="ih-item circle effect10 bottom_to_top">
                            <div class="img"><img src="{{asset("images/chefs")}}/{{$c->image}}" alt="img"></div>
                            <div class="info">
                                <h3>{{$c->name}} {{$c->lastname}}</h3>
                                <div class="team-icons">
                                    <ul>
                                        @foreach($c->socialNetworks as $soc)
                                            <li><a href="{{$soc->pivot->href}}"><i class="{{$soc->icon}}"></i></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="clearfix"> </div>
                <!-- end Bottom to top-->
            </div>
        </div>
    </div>




    <!-- newsletter -->
    <div class="jarallax newsletter margin">
        <div class="container">
            <div class="wthree-heading">
                <h3>Subscribe Now</h3>
            </div>
        </div>
        <div class="w3-agileits-newsletter">
            <div class="subscribe-grid">
                <form action="" method="POST">
                    <input type="email" placeholder="Subscribe" id="email" name="email">
                    <button id="news" type="button" class="btn1"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    <div style="color:red" id="error2"></div>
                    <div id="success2" style="color:green"></div>
                </form>
            </div>
        </div>
    </div>



@endsection
