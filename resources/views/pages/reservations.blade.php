@extends("Layouts.Layout")
@section("title")
    All Reservations
@endsection

@section("PhoneNumberOrPage")
    Wiew all your reservations
@endsection

@section("content")

    <div class="reservationContainer wthree-heading">
        <div class="resContainer2">
            <div class="px-4 px-lg-0">
                <div class="pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                                <div id="ttt" class="table-responsive">

                                    @if(count($reservations))
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="border-0 bg-light">
                                                    <div class="p-2 px-3 text-uppercase">#</div>
                                                </th>
                                                <th scope="col" class="border-0 bg-light checkoutClass2">
                                                    <div style="margin-left: 30px" class="p-2 px-3 text-uppercase">Image</div>
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
                                            </tr>
                                            </thead>
                                            <tbody style="font-size: 18px">
                                            @foreach($reservations as $reservation)
                                            @foreach($reservation->reservationLines as $i=>$reservationLine)
                                                <tr>
                                                    <th scope="row" class="border-0">
                                                        {{$i + 1}}
                                                    </th>
                                                    <th scope="row"  class="border-0 checkoutClass3">
                                                        <img src="{{asset('images/tables/'.$reservationLine->table->image)}}" alt="" width="100" class="img-fluid rounded shadow-sm">
                                                    </th>
                                                    <td class="border-0 align-middle">{{$reservationLine->table->name}}</td>
                                                    <td class="border-0 align-middle">
                                                        {{date('d.m.Y H:i', strtotime($reservationLine->date_time_of)) }}
                                                    </td>
                                                    <td class="border-0 align-middle">
                                                        {{date('d.m.Y H:i', strtotime($reservationLine->date_time_until)) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endforeach
                                            @else
                                                <div class="alert alert-danger alertReservation" role="alert">
                                                    You don't have any checked reservations
                                                </div>
                                            @endif

                                            </tbody>

                                        </table>
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
