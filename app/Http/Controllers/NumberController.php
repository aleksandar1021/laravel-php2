<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberRequest;
use App\Models\NumberOfChairs;
use App\Models\Reservation;
use App\Models\ReservationLine;
use App\Models\Table;
use App\Models\TablePremiumLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NumberController extends BaseController
{
    public function index(){
        $numbers=NumberOfChairs::all();
        return view('pages.admin.numbers', ['numbers'=>$numbers]);
    }
    public function create(){
        return view('pages.admin.addNumber', ['number'=>null]);
    }
    public function store(NumberRequest $request){
        try{
            $newNumber = new NumberOfChairs();
            $newNumber->name = $request->name;
            $newNumber->number = $request->number;
            $newNumber->save();
            return redirect()->route("numbers");
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }
    public function destroy($id){
        try{
            $tables = Table::where("id_number", $id)->get();
            foreach($tables as $t){
                $idTable = $t->id;
                $reservationLines = ReservationLine::where('id_table', $idTable)->get();

                foreach ($reservationLines as $reservationLine) {
                    $idReservation = $reservationLine->id_reservation;
                    $reservationLine->delete();
                }

                $t->delete();

                if (isset($idReservation)) {
                    Reservation::find($idReservation)->delete();
                    unset($idReservation);
                }
            }

            NumberOfChairs::find($id)->delete();

            return response()->json("success removed", 200);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
   }

    public function edit($id){
        try{
            $number = NumberOfChairs::find($id);
            return view("pages.admin.addNumber", ['number'=>$number]);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }

    public function update(NumberRequest $request, $id){
        try{
            $number = NumberOfChairs::find($id);
            $number->name = $request->name;
            $number->number = $request->number;
            $number->save();

            return redirect()->route("numbers");
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }

}
