<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\NumberOfChairs;
use App\Models\ReservationLine;
use App\Models\Table;
use App\Models\TablePremiumLevel;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TableController extends BaseController
{
    public function index(){
        $tables = Table::with("premiumLevel", "chairNumbers")->get();

        //dd($tables);
        return view('pages.admin.tables', ['tables'=>$tables]);
    }

    public function create(){
        $premium = TablePremiumLevel::all();
        $numbers = NumberOfChairs::all();
        return view('pages.admin.addTable', ['premium'=>$premium, 'numbers'=>$numbers, 'table'=>null]);
    }

    public function store(AddTableRequest $request){
        try{
            $newTable = new Table();
            $newTable->name = $request->tableName;
            $newTable->description = $request->description;
            $newTable->id_number = $request->number;
            $newTable->id_level = $request->premium;

            if($request->file('image')){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/tables/'), $imageName);
                $newTable->image = $imageName;
            }

            if($newTable->save()){
                return redirect()->route("tablesAdmin");
            }
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }

    }

    public function destroy($id){
        try {
            $table = Table::find($id);
            $resevations = ReservationLine::where('id_table',$id)->get();
            foreach ($resevations as $r){
                $r->delete();
            }
            $table->delete();
            return response()->json("success removed", 200);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

    public function edit($id){
        $table = Table::find($id);
        $premium = TablePremiumLevel::all();
        $numbers = NumberOfChairs::all();
        return view('pages.admin.addTable', ['premium'=>$premium, 'numbers'=>$numbers, 'table'=>$table]);
    }

    public function update(UpdateTableRequest $request, $id){
        try {
            $table = Table::find($id);
            $table->name = $request->tableName;
            $table->description = $request->description;
            $table->id_number = $request->number;
            $table->id_level = $request->premium;
            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/tables/'), $imageName);
                unlink("images/tables/".$table->image);
                $table->image = $imageName;
            }
            $table->save();

            return redirect()->route("tablesAdmin");
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }
}
