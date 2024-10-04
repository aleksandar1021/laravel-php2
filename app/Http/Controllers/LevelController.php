<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\Reservation;
use App\Models\ReservationLine;
use App\Models\Table;
use App\Models\TablePremiumLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LevelController extends BaseController
{
    public function index(){
        $levels = TablePremiumLevel::all();
        return view("pages.admin.levels", ['levels'=>$levels]);
    }

    public function create(){
        return view('pages.admin.addLevel', ['level'=>null]);
    }

    public function store(LevelRequest $request){
        try{
            $newLevel = new TablePremiumLevel();
            $newLevel->name = $request->name;
            $newLevel->save();

            return redirect()->route("levels");
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }

    public function edit($id){
        $level = TablePremiumLevel::find($id);
        return view('pages.admin.addLevel',['level'=>$level]);
    }

    public function update(LevelRequest $request, $id){
        try{
            $level = TablePremiumLevel::find($id);
            $level->name = $request->name;
            $level->save();

            return redirect()->route("levels");
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }

    public function destroy($id){
        try{
            $tables = Table::where("id_level", $id)->get();
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

            TablePremiumLevel::find($id)->delete();

            return response()->json("success removed", 200);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

}
