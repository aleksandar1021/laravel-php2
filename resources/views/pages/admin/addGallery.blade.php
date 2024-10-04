@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <div class="banner">
                <h2>
                    <h1>{{$gallery?"Update image":"Add new image"}}</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                    <form action="{{$gallery?route("editGallery", ['id'=>$gallery->id]):route("addGallery")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if($gallery)
                            @method("PATCH")
                        @endif
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Name</label>
                            <div class="col-sm-10">
                                <x-text-field nameAttr="name" inputValue="{{$gallery?$gallery->name:old('name')}}" placeholder="Enter name" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>
                        @error('name')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Category</label>
                            <div class="col-sm-10">
                                <x-drop-down-list class="form-control" selected="{{$gallery?$gallery->id_category:old('category')}}" attrValue="id" :options="$categories" attrText="name" attrName="category"></x-drop-down-list>
                            </div>
                        </div>
                        @error('category')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description">{{$gallery?$gallery->description:old('description')}}</textarea>
                            </div>
                        </div>
                        @error('description')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Image</label>
                            <div class="col-sm-10">
                                <input name="image" type="file">
                            </div>
                        </div>
                        @if(isset($gallery->image))
                            <img style="margin-left: 17%; border: 1px solid black; margin-bottom: 30px" width="400" src="{{asset("images/gallery/".$gallery->image)}}">
                        @endif
                        @error('image')
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
