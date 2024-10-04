@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">
                <h2>
                    <h1>Subscribed to newsletter</h1><br>
                    <a href="{{route("addSubscriber")}}"><button type="button" class="btn btn-lg btn-info">Add new subscriber</button></a>
                </h2>
            </div>
            <!--//banner-->
            <!--grid-->
            <div class="grid-form">

                <div class="grid-form1">
                    @if(count($newsletter))
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th style="text-align: center" scope="col">Edit</th>
                            <th style="text-align: right" scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($newsletter as $i=>$t)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$t->email}}</td>
                                    <td style="text-align: center"><a href="{{route("editSubscriber",['id'=>$t->id])}}"><button type="button" class="btn btn-lg btn-warning warning_11">Edit</button></a></td>
                                    <td style="text-align: right"><button onclick="deleteItem('/removeSubscriber', {{$t->id}}, this)" type="button" class="btn btn-lg btn-danger remove">Remove</button></td style="text-align: right">
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else
                        <div class="alert alert-danger" role="alert">
                            No subscribers
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
