@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">
                <h2>
                    <h1>Out team</h1><br>
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
                            <th scope="col">lastname</th>
                            <th scope="col">Email</th>
                            <th scope="col">View Networks</th>
                            <th style="text-align: center" scope="col">Edit</th>
                            <th style="text-align: right" scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($chefs)
                            @foreach($chefs as $i=>$t)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td><img width="100" src="{{asset("images/chefs")."/".$t->image}}"></td>
                                    <td>{{$t->name}}</td>
                                    <td>{{$t->lastname}}</td>
                                    <td>{{$t->email}}</td>
                                    <td><a href="{{route("viewNetworksForChef", ['id'=>$t->id])}}"><button type="button" class="btn btn-lg btn-info">View Networks</button></a></td>
                                    <td style="text-align: center"><a href="{{route("editChef",['id'=>$t->id])}}"><button type="button" class="btn btn-lg btn-warning warning_11">Edit</button></a></td>
                                    <td style="text-align: right"><button onclick="deleteItem('/removeChef', {{$t->id}}, this)" type="button" class="btn btn-lg btn-danger remove">Remove</button></td style="text-align: right">
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
