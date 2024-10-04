@extends("Layouts.Layout")

@section("title")
    Author
@endsection

@section("PhoneNumberOrPage")
    Author
@endsection

@section("content")
    <div class="contact">
        <div class="container">
            <div class="row ">
                <div class="col-lg-5 col-sm-12 col-12 ja">
{{--                    <img width="100%" src="{{asset("images/author/ja.jpg")}}"/>--}}
                </div>
                <div class="col-lg-7 col-sm-12 col-12 pt-5 pl-5 pr-5 pb-2 rightAuthor  bg-light">
                    <h1 class="mb-4 mainHeading">Something about me</h1>
                    <h3 class="headingAuthor">Name:</h3>
                    <h5 class="mb-4 text-black-50 headingAuthor2">Aleksandar</h5>
                    <h3 class="headingAuthor">Lastname:</h3>
                    <h5 class="mb-4 text-black-50 headingAuthor2">Kandic</h5>
                    <h3 class="headingAuthor">Address:</h3>
                    <h5 class="mb-4 text-black-50 headingAuthor2">Kosmajska 123, Sopot</h5>
                    <h3 class="mb-2 headingAuthor">Social</h3>
                    <ul class="d-flex list-unstyled flex-row" id="mrz">
                    </ul>
                    <p class="txt">
                        Here you can check out my <span id="portfolio"><a target="_blank" href="https://aleksandar-kandic-portfolio.000webhostapp.com/" class="txtt">portfolio.</a></span>
                    </p>
                </div>
            </div>


        </div>
    </div>

    <br><br><br>
    <!-- //contact -->
@endsection
