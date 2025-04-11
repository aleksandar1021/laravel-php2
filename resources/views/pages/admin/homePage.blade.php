@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">
                <h2>
                    <h1>Text for home page</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                <form method="POST" action="{{route("editHomePage", ['id'=>$home->id])}}" enctype="multipart/form-data">
                    @method("PATCH")
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Heading</label>
                        <textarea name="heading" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$home->heading}}</textarea>
                    </div>
                    @error('heading')
                    <div style="margin-left: 0% !important;" class="alert alert-danger errAdm">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Text 1</label>
                        <textarea name="text1" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$home->text1}}</textarea>
                    </div>
                    @error('text1')
                    <div style="margin-left: 0% !important;" class="alert alert-danger errAdm">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Text 2</label>
                        <textarea name="text2" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$home->text2}}</textarea>
                    </div>
                    @error('text2')
                    <div style="margin-left: 0% !important;" class="alert alert-danger errAdm">
                        {{$message}}
                    </div>
                    @enderror

                    <div style="margin-bottom: 50px !important;" class="form-group">
                        <div  class="col-sm-10">
                            <input  name="image" type="file">
                        </div>
                    </div>

                    @if(isset($home->image))
                        <img style="margin-left: 0%; border: 1px solid black; margin-bottom: 30px" width="400" src="{{asset("images/home/".$home->image)}}">
                    @endif
                    @error('image')
                    <div style="margin-left: 0% !important;" class="alert alert-danger errAdm">
                        {{$message}}
                    </div>
                    @enderror

                    <div style="margin-bottom: 50px; margin-right: 120%" class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>

                </form>

            </div>
            </div>


        </div>
@endsection


