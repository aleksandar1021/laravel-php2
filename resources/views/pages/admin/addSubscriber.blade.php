@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <div class="banner">
                <h2>
                    <h1>{{$subscriber?"Update subscriber":"Add new subscriber"}}</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                    <form action="{{$subscriber?route("editSubscriber", ['id'=>$subscriber->id]):route("addSubscriber")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if($subscriber)
                            @method("PATCH")
                        @endif
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Email</label>
                            <div class="col-sm-10">
                                <x-text-field nameAttr="email" inputValue="{{$subscriber?$subscriber->email:old('email')}}" placeholder="Enter email" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>

                        @error('email')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
@endsection
