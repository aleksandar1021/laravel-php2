@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <div class="banner">
                <h2>
                    <h1>{{isset($user[0])?"Update user":"Add new user"}}</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                    <form action="{{isset($user[0])?route("$route", ['id'=>$user[0]->id]):route("addUser")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if(isset($user[0]))
                            @method("PATCH")
                        @endif
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Name</label>
                            <div class="col-sm-10">
                                <x-text-field nameAttr="name" inputValue="{{isset($user[0])?$user[0]->name:old('name')}}" placeholder="Enter name" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>
                        @error('name')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Lastname</label>
                            <div class="col-sm-10">
                                <x-text-field inputValue="{{isset($user[0])?$user[0]->lastname:old('lastname')}}" nameAttr="lastname" placeholder="Enter description" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>
                        @error('lastname')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Email</label>
                            <div class="col-sm-10">
                                <x-text-field type="email" inputValue="{{isset($user[0])?$user[0]->email:old('email')}}" nameAttr="email" placeholder="Enter description" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>
                        @error('email')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        @if($route == 'addUser' || $route=='editUser')




                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label hor-form">Role</label>
                                <div class="col-sm-10">
                                    <x-drop-down-list id="role" class="form-control" selected="{{isset($user[0])?$user[0]->id_role:old('role')}}" attrValue="id" :options="$roles" attrText="name" attrName="role"></x-drop-down-list>
                                </div>
                            </div>
                            @error('role')
                            <div class="alert alert-danger errAdm">
                                {{$message}}
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label hor-form">Status</label>
                                <div class="col-sm-10">
                                    <x-drop-down-list id="role" class="form-control" selected="{{isset($user[0])?$user[0]->active:old('status')}}" attrValue="value" :options="$status" attrText="text" attrName="status"></x-drop-down-list>
                                </div>
                            </div>
                            @error('status')
                            <div class="alert alert-danger errAdm">
                                {{$message}}
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label hor-form">Password</label>
                                <div class="col-sm-10">
                                    <x-text-field type="password"  nameAttr="password" placeholder="Enter password" class="form-control" class="form-control"></x-text-field>
                                </div>
                            </div>
                            @error('password')
                            <div class="alert alert-danger errAdm">
                                {{$message}}
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label hor-form">Repeat password</label>
                                <div class="col-sm-10">
                                    <x-text-field type="password" nameAttr="password_confirmation" placeholder="Repeat password" class="form-control" class="form-control"></x-text-field>
                                </div>
                            </div>
                            @error('password_confirmation')
                            <div class="alert alert-danger errAdm">
                                {{$message}}
                            </div>
                            @enderror
                        @endif

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Image(not required)</label>
                            <div class="col-sm-10">
                                <input name="image" type="file">
                            </div>
                        </div>

                        @if(isset($user[0]))
                            <img style="margin-left: 17%; border: 1px solid black; margin-bottom: 30px" width="200" src="{{asset("images/chefs/".$user[0]->image)}}">
                        @endif

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

@section("scripts")
{{--            <script>--}}
{{--                $("#role").change(function(){--}}
{{--                    if($(this).val()==3){--}}
{{--                        $("#imageChef").html(`<div class="form-group">--}}
{{--                                                    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Image for chef</label>--}}
{{--                                                        <div class="col-sm-10">--}}
{{--                                                        <input name="image" type="file">--}}
{{--                                                    </div>--}}
{{--                                                </div>`)--}}
{{--                    }--}}
{{--                })--}}
{{--            </script>--}}
@endsection
