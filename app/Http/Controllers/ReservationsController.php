<?php

namespace App\Http\Controllers;

use App\Models\OurUser;
use App\Models\Reservation;
use App\Models\ReservationLine;
use Illuminate\Http\Request;

class ReservationsController extends BaseController
{
    public function index(Request $request){
        $idUser = $request->session()->get('user')->id;
        $reservations = Reservation::whereHas('reservationLines.table')->where('id_user', $idUser)->with('reservationLines.table')->get();

        //dd($reservations);
        return view('pages.reservations', ['reservations'=>$reservations]);
    }
}
