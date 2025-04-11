<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin Form</title>
    <link rel="stylesheet" href="{{asset("css/signup.css")}}">
</head>
<body>

<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>SignIn</h3>
                    <p>Fill in the data below.</p>
                    <form class="requires-validation"  method="POST" action="{{route("signin.signin")}}">
                        @csrf
                        <div class="col-md-12">
                            <input class="form-control"value="{{ old('email') }}" type="text" name="email" placeholder="E-mail Address">
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" value="{{old("password")}}" type="password" name="password" placeholder="Password">
                        </div>
                        <br>
                        <div class="invalid-feedback">
                            @if(session("error"))
                                <div>{{ session("error") }}</div>
                            @endif
                        </div>

                        <br>
                        <div class="form-button mt-3">
                            <button id="submit" name="potvrdi" type="submit" class="btn btn-primary">Signin</button>
                        </div>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
