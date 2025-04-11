@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">
                <h2>
                    <h1>Social networks for chef</h1><br>
                    <a href="{{route("addNetworkForChef", ['id'=>$id])}}"><button type="button" class="btn btn-lg btn-info">Add network for this chef</button></a>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">

                <div class="grid-form1">
                    @if($networks)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Network</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Link</th>
                            <th style="text-align: center" scope="col">Edit</th>
                            <th style="text-align: right" scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($networks as $i=>$t)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$t->network->name}}</td>
                                    <td><i class="{{$t->network->icon}}" style="font-size: 20px; width: 30px; height: 30px"></i></td>
                                    <td>{{$t->href}}</td>
                                    <td style="text-align: center"><a href="{{route("editChefsNetwork",['id'=>$t->id, 'idUser'=>$t->id_user])}}"><button type="button" class="btn btn-lg btn-warning warning_11">Edit</button></a></td>
                                    <td style="text-align: right"><button onclick="deleteItem('/removeNetworkForChef', {{$t->id}}, this)" type="button" class="btn btn-lg btn-danger remove">Remove</button></td style="text-align: right">
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
