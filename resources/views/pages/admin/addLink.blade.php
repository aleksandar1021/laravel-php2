@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <div class="banner">
                <h2>
                    <h1>{{$link?"Update link":"Add new link"}}</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                    <form action="{{$link?route("editLink", ['id'=>$link->id]):route("addLink")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if($link)
                            @method("PATCH")
                        @endif
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Name</label>
                            <div class="col-sm-10">
                                <x-text-field nameAttr="name" inputValue="{{$link?$link->name:old('name')}}" placeholder="Enter number name" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>
                        @error('name')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Link</label>
                            <div class="col-sm-10">
                                <x-text-field nameAttr="link" inputValue="{{$link?$link->href:old('link')}}" placeholder="Enter link" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>
                        @error('link')
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
