@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">
                <h2>
                    <h1>Comments</h1><br>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">

                    @if(count($comments))
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                                <th style="text-align: right" scope="col">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $i=>$t)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$t->user->name}}</td>
                                    <td>{{$t->user->lastname}}</td>
                                    <td>{{$t->subject}}</td>
                                    <td>{{$t->message}}</td>
                                    <td>
                                        <form action="{{route("changeStatus", ['id'=>$t->id])}}" method="POST">
                                            @csrf
                                            @method("PATCH")
                                            <button value="{{$t->id}}" name="status" type="submit" class="btn btn-lg {{$t->active?"btn-success":"btn-warning"}} status">{{$t->active?"Deactivate":"Activate"}}</button>
                                        </form>
                                    </td>
                                    <td style="text-align: right; height: 100%"><button style="margin-top: 19px" onclick="deleteItem('/removeComment', {{$t->id}}, this)" type="button" class="btn btn-lg btn-danger remove">Remove</button></td style="text-align: right">
                                </tr>
                            @endforeach
                            @else
                                <div class="alert alert-danger" role="alert">
                                    No messages
                                </div>
                            @endif
                            </tbody>
                        </table>
                </div>
            </div>


        </div>

@endsection




