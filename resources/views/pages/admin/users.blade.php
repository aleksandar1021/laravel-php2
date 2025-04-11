@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">
                <h2>
                    <h1>All users</h1><br>
                    <a href="{{route("addUser")}}"><button type="button" class="btn btn-lg btn-info">Add new user</button></a>
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
                            <th scope="col">Lastname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th style="text-align: center" scope="col">Edit</th>
                            <th style="text-align: right" scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users)
                            @foreach($users as $i=>$t)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td><img width="100" src="{{asset("images/chefs")}}/{{$t->image}}"/></td>
                                    <td>{{$t->name}}</td>
                                    <td>{{$t->lastname}}</td>
                                    <td>{{$t->email}}</td>
                                    <td>{{$t->role->name}}</td>
                                    <td>{{$t->active?"Active":"Inactive"}}</td>
                                    <td style="text-align: center"><a href="{{route("editUser",['id'=>$t->id])}}"><button type="button" class="btn btn-lg btn-warning warning_11">Edit</button></a></td>
                                    <td style="text-align: right"><button onclick="deleteItem('/removeUser', {{$t->id}}, this)" type="button" class="btn btn-lg btn-danger remove">Remove</button></td style="text-align: right">
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
