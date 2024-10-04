@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <div class="banner">
                <h2>
                    <h1>{{$chef?"Update network":"Add new network"}}</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                    <form action="{{$chef?route("editNetworkForChef2", ['id'=>$id]):route("addNetworkForChef2")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}">
                        <input type="hidden" name="idUser" value="{{isset($idUser)?$idUser:""}}">
                        @if($chef)
                            @method("PATCH")
                        @endif
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Link</label>
                            <div class="col-sm-10">
                                <x-text-field nameAttr="link" inputValue="{{$chef?$chef[0]->href:old('link')}}" placeholder="Enter link for social network" class="form-control" class="form-control"></x-text-field>
                            </div>
                        </div>
                        @error('link')
                        <div class="alert alert-danger errAdm">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Network</label>
                            <div class="col-sm-10">
                                <x-drop-down-list class="form-control" selected="{{$chef?$chef[0]->network->id:old('network')}}" attrValue="id" :options="$networks" attrText="name" attrName="network"></x-drop-down-list>
                            </div>
                        </div>
                        @error('network')
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
