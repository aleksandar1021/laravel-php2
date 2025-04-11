@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">
                <h2>
                    <h1>All reservation</h1><br>
                    <a href="{{route("addReservation")}}"><button type="button" class="btn btn-lg btn-info">Add new reservation for user</button></a><br><br>
                    Reservations are created here, by clicking the View details button, items are added, changed and deleted for the selected reservation
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">

                <div class="grid-form1">
                    @if(count($reservations))
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date</th>
                            <th scope="col">View details</th>
                            <th style="text-align: center" scope="col">Edit</th>
                            <th style="text-align: right" scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($reservations as $i=>$t)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$t->user->name}}</td>
                                    <td>{{$t->user->lastname}}</td>
                                    <td>{{$t->user->email}}</td>
                                    <td>{{$t->created_at}}</td>
                                    <td><a href="{{route("viewReservations",['id'=>$t->id])}}"><button type="button" class="btn btn-lg btn-info">View details</button></a></td>
                                    <td style="text-align: center"><a href="{{route("editReservation",['id'=>$t->id])}}"><button type="button" class="btn btn-lg btn-warning warning_11">Edit</button></a></td>
                                    <td style="text-align: right"><button onclick="deleteItem('/removeReservation', {{$t->id}}, this)" type="button" class="btn btn-lg btn-danger remove">Remove</button></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else
                        <div class="alert alert-danger" role="alert">
                            No reservations
                        </div>
                    @endif
                </div>
            </div>


        </div>
        @endsection

        @section("scripts")
            <script>

            </script>
@endsection
