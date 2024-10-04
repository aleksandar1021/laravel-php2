<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends BaseController
{
    public function index(Request $request){
        $reservations = [];
        if($reservations = $request->session()->has('reservation')){
            $reservations = $request->session()->get('reservation');
        }
        //dd($reservations);
        return view('pages.checkout', ['reservations'=>$reservations]);
    }
}
