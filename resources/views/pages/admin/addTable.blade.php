@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <div class="banner">
                <h2>
                    <h1>{{$table?"Update table":"Add new table"}}</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                    <form action="{{$table?route("updateTable", ['id'=>$table->id]):route("addTable")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if($table)
                            @method("PATCH")
                        @endif
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Name</label>
                            <div class="col-sm-10">
                                <x-text-field nameAttr="tableName" inputValue="{{$table?$table->name:old('tableName')}}" placeholder="Enter name" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>
                        @error('tableName')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Description</label>
                            <div class="col-sm-10">
                                <x-text-field inputValue="{{$table?$table->description:old('description')}}" nameAttr="description" placeholder="Enter description" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>
                        @error('description')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Premium level</label>
                            <div class="col-sm-10">
                                <x-drop-down-list class="form-control" selected="{{$table?$table->id_level:old('premium')}}" attrValue="id" :options="$premium" attrText="name" name="premium" attrName="premium"></x-drop-down-list>
                            </div>
                        </div>
                        @error('premium')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Numbers of chairs</label>
                            <div class="col-sm-10">
                                <x-drop-down-list selected="{{$table?$table->id_number:old('number')}}" class="form-control" attrValue="id" :options="$numbers" attrText="number"  attrName="number"></x-drop-down-list>
                            </div>
                        </div>
                        @error('number')
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
                        @if(isset($table->image))
                            <img style="margin-left: 17%; border: 1px solid black; margin-bottom: 30px" width="150" src="{{asset("images/tables/".$table->image)}}">
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
