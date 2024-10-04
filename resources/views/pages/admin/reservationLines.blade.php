@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">
                <h2>
                    <h1>All reservation lines for this reservation</h1><br>
                    <a href="{{route("addReservationLine", ['id'=>$id])}}"><button type="button" class="btn btn-lg btn-info">Add new reservation line</button></a>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">

                <div class="grid-form1">
                    @if(count($reservationLines))
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Table name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Date of</th>
                                <th scope="col">Date until</th>
                                <th style="text-align: center" scope="col">Edit</th>
                                <th style="text-align: right" scope="col">Remove</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reservationLines as $i=>$t)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$t->table->name}}</td>
                                    <td><img width="100" src="{{asset("images/tables")."/".$t->table->image}}"></td>
                                    <td>{{$t->date_time_of}}</td>
                                    <td>{{$t->date_time_until}}</td>
                                    <td style="text-align: center"><a href="{{route('editReservationLine', ['id' => $t->id, 'idRes' => $id])}}"><button type="button" class="btn btn-lg btn-warning warning_11">Edit</button></a></td>
                                    <td style="text-align: right"><button onclick="deleteItem('/removeLine', {{$t->id}}, this)" type="button" class="btn btn-lg btn-danger remove">Remove</button></td>
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
