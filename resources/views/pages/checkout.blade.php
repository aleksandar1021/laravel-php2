@extends("Layouts.Layout")
@section("title")
    Checkout
@endsection

@section("PhoneNumberOrPage")
    Checkout yours reservations
@endsection

@section("content")

    <div class="reservationContainer wthree-heading">
        <h3>Checkout yours reservations</h3><br><br>
        <div class="resContainer2">
            <div class="px-4 px-lg-0">
                <div class="pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                                <div id="ttt" class="table-responsive">

                                    @if($reservations)
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="border-0 bg-light">
                                                    <div class="p-2 px-3 text-uppercase">#</div>
                                                </th>
                                                <th scope="col" class="border-0 bg-light checkoutClass2">
                                                    <div class="p-2 px-3 text-uppercase">Image</div>
                                                </th>
                                                <th scope="col" class="border-0 bg-light checkoutClass">
                                                    <div class="py-2 text-uppercase">Name</div>
                                                </th>
                                                <th scope="col" class="border-0 bg-light checkoutClass">
                                                    <div class="py-2 text-uppercase">Start date</div>
                                                </th>
                                                <th scope="col" class="border-0 bg-light checkoutClass">
                                                    <div class="py-2 text-uppercase align-middle">End date</div>
                                                </th>
                                                <th scope="col" class="border-0 bg-light checkoutClass">
                                                    <div class="py-2 text-uppercase">Remove</div>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody style="font-size: 18px">
                                                @foreach($reservations as $index=>$r)
                                                    <tr>
                                                        <th scope="row" class="border-0">
                                                            {{$index + 1}}
                                                        </th>
                                                        <th scope="row"  class="border-0 checkoutClass3">
                                                            <img src="{{asset("images/tables")}}/{{$r['image']}}" alt="" width="100" class="img-fluid rounded shadow-sm">
                                                        </th>
                                                        <td class="border-0 align-middle">{{$r['name']}}</td>
                                                        <td class="border-0 align-middle">{{date('d.m.Y H:i', strtotime($r['start'])) }}</td>
                                                        <td class="border-0 align-middle">{{date('d.m.Y H:i', strtotime($r['end']))}}</td>
                                                        <td class="border-0 align-middle"><a href="" data-id="{{$r['id']}}"  class="text-dark removeBtn"><i style="font-size: 40px" class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <div class="alert alert-danger alertReservation" role="alert">
                                                    There are currently no reservations, please make a reservation on the reservation page
                                                </div>
                                            @endif

                                        </tbody>

                                    </table>
                                        @if($reservations)
                                            <input class="buttonCustom" id="reservateAll" type="button" value="RESERVE ALL SELECTED TABLES">
                                        @endif
                                </div>
                                <!-- End -->
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>

    </style>



@endsection
