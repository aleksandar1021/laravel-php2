@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <div class="banner">
                <h2>
                    <h1>All activities</h1><br>
                    Filter by date:<br>
                    <form class="filterDiv" action="{{route("activityFilter")}}" method="get" id="form1">
                        <input value="{{isset($start)?$start:old("start")}}" class="dates"  type="datetime-local" id="myDatetime" name="start">&nbsp;&nbsp;&nbsp;
                        <input value="{{isset($end)?$end:old("end")}}" class="dates" type="datetime-local" id="myDatetime" name="end">
                        <button type="submit" class="btn btn-lg btn-info remove">Search</button>
                    </form>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">

                <div class="grid-form1">
                    @if(count($activities))

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Lastname</th>
                            <th scope="col">User Email</th>
                            <th scope="col">IP Address</th>
                            <th scope="col">Date</th>
                            <th scope="col">Type of activity</th>
                            <th scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activities as $i=>$t)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$t->user->name}}</td>
                                    <td>{{$t->user->lastname}}</td>
                                    <td>{{$t->user->email}}</td>
                                    <td>{{$t->ip_address}}</td>
                                    <td>{{$t->created_at}}</td>
                                    <td>{{$t->type->name}}</td>
                                    <td><button onclick="deleteItem('/removeActivity', {{$t->id}}, this)" type="button" class="btn btn-lg btn-danger remove">Remove</button></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                        <div class="pagination2">{{ $activities->links(('vendor.pagination.default')) }}</div>
                            @else
                                <div class="alert alert-danger" role="alert">
                                    No activity
                                </div>
                            @endif

                </div>
            </div>


        </div>
@endsection

