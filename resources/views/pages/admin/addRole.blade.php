@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <div class="banner">
                <h2>
                    <h1>{{$role?"Update role":"Add new role"}}</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                    <form action="{{$role?route("editRole", ['id'=>$role->id]):route("addRole")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if($role)
                            @method("PATCH")
                        @endif
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Name</label>
                            <div class="col-sm-10">
                                <x-text-field nameAttr="name" inputValue="{{$role?$role->name:old('name')}}" placeholder="Enter name" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>

                        @error('name')
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
