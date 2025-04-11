@extends("Layouts.AdminLayout")
@section("content")
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">

            <!--banner-->
            <div class="banner">
                <h2>
                    <h1>All numbers of chairs for tables</h1><br>
                    <a href="{{route("addNumber")}}"><button type="button" class="btn btn-lg btn-info">Add new number</button></a>
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
                            <th scope="col">Number(text)</th>
                            <th scope="col">Number</th>
                            <th style="text-align: center" scope="col">Edit</th>
                            <th style="text-align: right" scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($numbers)
                            @foreach($numbers as $i=>$t)
                                <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$t->name}}</td>
                                    <td>{{$t->number}}</td>
                                    <td style="text-align: center"><a href="{{route("editNumber",['id'=>$t->id])}}"><button type="button" class="btn btn-lg btn-warning warning_11">Edit</button></a></td>
                                    <td style="text-align: right"><button onclick="deleteItem('/removeNumber', {{$t->id}}, this)" type="button" class="btn btn-lg btn-danger remove">Remove</button></td style="text-align: right">
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
