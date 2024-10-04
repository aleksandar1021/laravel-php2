<?php

namespace App\Http\Controllers;

use App\Models\NumberOfChairs;
use App\Models\Reservation;
use App\Models\ReservationLine;
use App\Models\Table;
use App\Models\TablePremiumLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ReservationController extends BaseController
{
    public function index(){
        $numbers = NumberOfChairs::all();
        $categories = TablePremiumLevel::all();
        //$tables = Table::with("premiumLevel", "chairNumbers")->get();
        return view("pages.reservation", ['numbers'=>$numbers, 'categories'=>$categories]);
    }

    public function getTables(Request $request){
        $model = new Table();
        return response()->json($model->filter($request->search,$request->premiumCategory,$request->numberCategory, $request->sort));
    }

    public function reserve(Request $request){
        //$request->session()->forget('reservation');
        $errors = [];
        if ($request->start == null || $request->end == null) {
            return response()->json(['errors' => 'You have not entered any dates, both dates are required <br>']);
        }
        if (!$request->start) {
            $errors[] = 'No start date sent <br>';
        }
        if (!$request->end) {
            $errors[] = 'No start end date sent <br>';
        }
        if (!$request->id_table) {
            $errors[] = 'An error occurred, it is not selected, please try again <br>';
        }

        $start = $request->start;
        $end = $request->end;

        if (strtotime($start) < time() || strtotime($end) < time()) {
            $errors[] = 'Dates cannot be in the past <br>';
        }

        if (strtotime($start) >= strtotime($end)) {
            $errors[] = 'The start date must be greater than the end date <br>';
        }

        $isReservate = ReservationLine::where('id_table', $request->id_table)
            ->where(function ($query) use ($start, $end) {
                $query->where('date_time_of', '<', $end)
                    ->where('date_time_until', '>', $start);
            })->exists();

        if ($isReservate) {
            return response()->json(['errors' => 'There is a reservation for this table in the selected time range, please select another time range or another table <br>']);
        }
        if ($request->session()->has('reservation')) {
            $reservation = $request->session()->get('reservation');
            foreach ($reservation as $r){
                if ($r['id_table'] == $request->id_table && strtotime($r['start']) < strtotime($end) && strtotime($r['end']) > strtotime($start)) {
                    return response()->json(['errors' => 'You have already reserved this table in this time range, choose another time or another table <br>']);
                }
            }
        }

        $diffInDays = floor((strtotime($end) - strtotime($start)) / (60 * 60 * 24));
        if ($diffInDays > 10) {
            $errors[] = 'The difference between the start and end date must not be more than 10 days <br>';
        }

        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 200);
        }

        $uniqueId = (string) Str::uuid();

        $this->log(3);

        if($request->session()->has("reservation")){
            $request->session()->push("reservation", ['id'=>$uniqueId,
                'start' => $start,
                'end' => $end,
                'id_table'=>$request->id_table,
                'name'=>$request->name,
                'id_user'=>$request->session()->get('user')->id,
                'image'=>$request->image
            ]);
        }else{
            $request->session()->put("reservation", [['id'=>$uniqueId,
                'start' => $start,
                'end' => $end,
                'id_table'=>$request->id_table,
                'name'=>$request->name,
                'id_user'=>$request->session()->get('user')->id,
                'image'=>$request->image
            ]]);
        }



        return response()->json(['errors' => 'Reservation successfully saved, go to the <a href="/checkout">reservation check page</a> to complete the reservation'], 200);
    }

    public function destroy(Request $request, string $id){
        try{
//            dd("tu");
            $reservations = $request->session()->get('reservation');
            $newArray = [];
            foreach($reservations as $index => $r){
                if($r['id'] != $id){
                    $newArray[] = $r;
                }
            }
            $request->session()->put('reservation', $newArray);
            //$this->log(5);
            return response()->json(count($request->session()->get('reservation')), 200);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

    public function store(Request $request){
        try{
            $reservations = $request->session()->get('reservation');
            $idUser = $request->session()->get('user')->id;

            $newReservation = new Reservation();
            $newReservation->id_user=$idUser;
            $newReservation->save();

            $lastInsertedId = $newReservation->id;

            foreach ($reservations as $r){
                $newLine = new ReservationLine();
                $newLine->id_reservation = $lastInsertedId;
                $newLine->date_time_of = $r['start'];
                $newLine->id_table = $r['id_table'];
                $newLine->date_time_until = $r['end'];
                $newLine->save();
            }
            $this->log(4);
            $request->session()->forget('reservation');
            return response()->json("All reservations are saved, you can view them on the reservations view <a href='/reservations'>reservations page</a>", 200);


        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

}
