@extends("Layouts.Layout")

@section("title")
    Contact
@endsection

@section("PhoneNumberOrPage")
    Contact
@endsection

@section("content")
    <div class="contact">
        <div class="container">
            <div class="wthree-heading">
                <h3>Contact Form</h3>
            </div>
            <div class="agile-contact-form">
                <form  method="POST" action="" id="contactForm">
                    <input type="text" id="name" name="Your Name" placeholder="Your Name">
                    <input  type="email" id="email" name="Your Email" placeholder="Your Email">
                    <textarea id="message" name="Your Message" placeholder="Your Message"></textarea>
                    <div style="color:red" id="errors"></div>
                    <div id="success" style="color:green"></div>
                    <input type="button" id="send"  value="SEND">
                </form>
                <div class="w3agile-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d181139.45289262536!2d20.257787344990174!3d44.81537040356104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa3d7b53fbd%3A0x1db8645cf2177ee4!2z0JHQtdC-0LPRgNCw0LQ!5e0!3m2!1ssr!2srs!4v1708986920571!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
        </div>
    </div>
    </div>

    <br><br><br>
    <!-- //contact -->
@endsection
