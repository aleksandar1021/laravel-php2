<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="{{asset("css/signup.css")}}">
</head>
<body>

<div class="form-body">
    <div class="row">

        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Register Today</h3>
                    <p>Fill in the data below.</p>
                    <form class="requires-validation"  method="POST" action="{{route("register")}}">
                        @csrf
                        <div class="col-md-12">
                            <input class="form-control" value="{{old("name")}}" type="text" name="name" placeholder="Name">
                            <div class="invalid-feedback">
                                @error('name')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" value="{{old("lastname")}}" type="text" name="lastname" placeholder="Lastname">
                            <div class="invalid-feedback">
                                @error('lastname')
                                <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control" value="{{old("email")}}" type="text" name="email" placeholder="E-mail Address">
                            <div class="invalid-feedback">
                                @error('email')
                                <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                            <div class="invalid-feedback">
                                @error('password')
                                <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control"  type="password" name="password_confirmation" placeholder="Repeat password">
                            <div class="invalid-feedback">
                                @error('password_confirmation')
                                <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="form-button mt-3">
                            <button id="submit" name="potvrdi" type="submit" class="btn btn-primary">Register</button>
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
