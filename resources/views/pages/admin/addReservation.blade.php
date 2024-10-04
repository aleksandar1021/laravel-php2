@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <div class="banner">
                <h2>
                    <h1>{{$user?"Update reservation":"Add new reservation"}}</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                    <form action="{{$user?route("editReservation", ['id'=>$user->id]):route("addReservation")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if($user)
                            @method("PATCH")
                        @endif
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Choose user</label>
                            <div class="col-sm-10">
                                <x-drop-down-list id="table" class="form-control" selected="{{$user?$user->user->id:old('table')}}" attrValue="id" :options="$users" attrText="email" attrName="user"></x-drop-down-list>
                            </div>
                        </div>
                        @error('user')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        @if($user)
                            <input type="hidden" value="{{$user->id}}" name="id_res" />
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



