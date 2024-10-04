@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">
                <h2>
                    <h1>All tables</h1><br>
                    <a href="{{route("addTable")}}"><button type="button" class="btn btn-lg btn-info">Add new table</button></a>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">

                <div class="grid-form1">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Numbers of chairs</th>
                            <th scope="col">Premium level</th>
                            <th style="text-align: center" scope="col">Edit</th>
                            <th scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($tables)
                                @foreach($tables as $i=>$t)
                                    <tr>
                                        <th scope="row">{{$i+1}}</th>
                                        <td><img width="100px" src="{{asset("images/tables")."/".$t->image}}"></td>
                                        <td>{{$t->name}}</td>
                                        <td>{{$t->description}}</td>
                                        <td>{{$t->chairNumbers->number}}</td>
                                        <td>{{$t->premiumLevel->name}}</td>
                                        <td style="text-align: center"><a href="{{route("editTable",['id'=>$t->id])}}"><button type="button" class="btn btn-lg btn-warning warning_11">Edit</button></a></td>
                                        <td><button type="button" onclick="deleteItem('/removeTable', {{$t->id}}, this)" class="btn btn-lg btn-danger remove">Remove</button></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>


    </div>
@endsection

@section("scripts")
    <script>

    </script>
@endsection
