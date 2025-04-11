@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <div class="banner">
                <h2>
                    <h1>{{$line?"Update reservation line":"Add new reservation line"}}</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                    <form action="{{$line?route("editLine", ['id'=>$line->id]):route("addLine")}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if($line)
                            @method("PATCH")
                        @endif
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label hor-form">Choose table</label>
                            <div class="col-sm-10">
                                <x-drop-down-list id="table" class="form-control" selected="{{$line?$line->id_table:old('table')}}" attrValue="id" :options="$tables" attrText="name" attrName="table"></x-drop-down-list>
                            </div>
                        </div>

                        <div class="form-group">
                            <input value="{{$line?$line->date_time_of:old("start")}}" {{$line?"":"disabled"}} class="dates" style="margin-left: 17.8%" type="datetime-local" id="myDatetime" name="start">
                            <input value="{{$line?$line->date_time_until:old("end")}}" {{$line?"":"disabled"}}  class="dates" type="datetime-local" id="myDatetime" name="end">
                        </div>

                        <input type="hidden" id="id" name="id_table" value="{{$line?$line->id_table:""}}">
                        @if($line)
                        <input type="hidden" id="id_res" name="id_res" value="{{$idRes}}">
                        @else
                            <input type="hidden" id="id_res" name="id_res" value="{{$id}}">
                        @endif

                        @if(session('lineError'))
                            <div class="alert alert-danger errAdm">
                                {{session('lineError')}}
                            </div>
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
    <script>
        if($("#table").val() < 0){
            $("#table").change(function(){
                $("#id").val($(this).val());
                $(".dates").removeAttr("disabled")
            })
        }else{
            $(".dates").removeAttr("disabled")
        }
        $("#table").change(function(){
            $("#id").val($(this).val());
        })


        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');

        const minDatetime = `${year}-${month}-${day}T${hours}:${minutes}`;
        $('.dates').attr('min', minDatetime);


    </script>
@endsection
