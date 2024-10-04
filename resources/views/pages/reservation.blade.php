@extends("Layouts.Layout")
@section("title")
    Reservation
@endsection

@section("PhoneNumberOrPage")
    Reservation
@endsection

@section("content")

    <div class="reservationContainer wthree-heading">
        <h3 >Reserve now</h3><br><br>
        <div class="resContainer2">
            <div class="r-left">
                <div id="filters">
                    <h2 class="naslovreservation">Filters:</h2><br>
                    <x-text-field id="searchReservation" placeholder="Search a table" class="searchRes"></x-text-field>
                    <h2 class="hh11">Premium level</h2>
                    @foreach($categories as $c)
                        <div class="form-check">
                            <input class="form-check-input premium" type="checkbox" value="{{$c->id}}" id="exc-{{$c->id}}">
                            <label class="labelReservation" for="exc-{{$c->id}}">
                                {{$c->name}}
                            </label>
                        </div>
                    @endforeach
                    <br>
                    <h2 class="hh11">Number of chairs:</h2>
                    @foreach($numbers as $n)
                        <div class="form-check">
                            <input class="form-check-input chc numberChairs" type="checkbox" value="{{$n->id}}" id="n-{{$n->id}}">
                            <label class="labelReservation" for="n-{{$n->id}}">
                                {{$n->number}} ({{$n->name}})
                            </label>
                        </div>
                    @endforeach

                    <select id="sort">
                        <option hidden value="asc">Sort By</option>
                        <option value="asc">Sort by description A-Z</option>
                        <option value="desc">Sort by description Z-A</option>
                    </select>
                </div>

            </div>
            <div id="tables" class="r-right">

{{--                @foreach($tables as $t)--}}
{{--                    <div class="reservationCard flex">--}}
{{--                        <div class="resImage">--}}
{{--                            <img src="{{asset("images/tables")}}/{{$t->image}}">--}}
{{--                        </div>--}}
{{--                        <div class="content">--}}
{{--                            <h2 class="naslov2">Premium level od table:</h2>--}}
{{--                            <p>{{$t->premiumLevel->name}}</p>--}}
{{--                            <div class="flex chairs"><h2 class="naslov2">Number of chairs:</h2>&nbsp;--}}
{{--                                <p>{{$t->chairNumbers->number}}</p></div>--}}
{{--                            <h2 class="naslov2" id="nnn">Choose a date and time:</h2>--}}
{{--                            <input type="datetime-local" class="meeting-time" name="meeting-time" min="<?php echo date('Y-m-d\TH:i'); ?>">&nbsp;--}}
{{--                            <input type="datetime-local" class="meeting-time" name="meeting-time" min="<?php echo date('Y-m-d\TH:i'); ?>">&nbsp;--}}
{{--                            <input class="buttonCustom" type="button" id="reservate"  value="RESERVE">&nbsp;--}}
{{--                            <h2 class="naslov2">Description:</h2>--}}
{{--                            <p>{{$t->description}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}


            </div>
        </div>
    </div>




@endsection
