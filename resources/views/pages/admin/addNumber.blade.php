@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <div class="banner">
                <h2>
                    <h1>{{$number?"Update number":"Add new number"}}</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                    <form action="{{$number?route("editNumber", ['id'=>$number->id]):route("addNumber")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if($number)
                            @method("PATCH")
                        @endif
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Text</label>
                            <div class="col-sm-10">
                                <x-text-field nameAttr="name" inputValue="{{$number?$number->name:old('name')}}" placeholder="Enter number name" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>
                        @error('name')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Number</label>
                            <div class="col-sm-10">
                                <input value="{{$number?$number->number:old('number')}}" name="number" type="number">
                            </div>
                        </div>

                        @error('number')
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
