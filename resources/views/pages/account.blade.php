@extends("Layouts.Layout")
@section("title")
    Account
@endsection

@section("PhoneNumberOrPage")
    Edit your account
@endsection

@section("content")

    <div class="reservationContainer wthree-heading">
{{--        <h3>Checkout yours reservations</h3><br><br>--}}
        <div>
                <form id="account22" action="{{route("editAccount", ['id'=>$user->id])}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method("PATCH")
                    <div id="imm">
                        <label>Image:</label>
                        <img src="{{asset("images/chefs/".$user->image)}}">
                        <input  id="fileAdmin" type="file" name ="image"/><br>
                        @error('image')
                        <div class="alert alert-warning errAcc">
                            {{$message}}
                        </div>
                        @enderror
                    </div>



                    <div id="fields">

                        <div class="mb-3">
                           <x-text-field nameAttr="name" inputValue="{{$user->name}}" label="Change your name" class="accountField"></x-text-field>
                        </div>
                        @error('name')
                        <div class="alert alert-warning errAcc">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="mb-3">
                            <x-text-field nameAttr="lastname" inputValue="{{$user->lastname}}" label="Change your lastname" class="accountField"></x-text-field>
                        </div>
                        @error('lastname')
                        <div class="alert alert-warning errAcc">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="mb-3">
                            <x-text-field nameAttr="email" inputValue="{{$user->email}}" label="Change your email" class="accountField"></x-text-field>
                        </div>
                        @error('email')
                        <div class="alert alert-warning errAcc">
                            {{$message}}
                        </div>
                        @enderror


                        <div class="mb-3">
                            <x-text-field type="password" nameAttr="password" placeholder="Enter new password" label="Change your password" class="accountField"></x-text-field>
                        </div>
                        @error('password')
                        <div class="alert alert-warning errAcc">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-3">
                            <x-text-field type="password" nameAttr="password_confirmation" placeholder="Repeat new password" label="Repeat new password" class="accountField"></x-text-field>
                        </div>
                        @error('password_confirmation')
                        <div class="alert alert-warning errAcc">
                            {{$message}}
                        </div>
                        @enderror

                        @if(session('success'))
                            <div class="alert alert-success errAcc">
                                {{session('success')}}
                            </div>
                        @endif



                        <input type="submit" id="send2" value="SUBMIT">

                    </div>

                </form>



        </div>
    </div>


    <style>

    </style>



@endsection
