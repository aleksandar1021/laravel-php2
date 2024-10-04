<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends BaseController
{
    public function showAll(Request $request){
        $activities = Activity::with('user', 'type')->paginate(10)->withQueryString();
        return view('pages.admin.activities', ['activities'=>$activities]);
    }

    public function index(Request $request){
        $activities = Activity::with('user', 'type')->get();
        $model = new Activity();
        $start=$request->start;
        $end=$request->end;
        return view('pages.admin.activities', ['start'=>$start,'end'=>$end,'activities'=>$model->filter($request->start, $request->end)]);
    }

    public function destroy($id){
        try{
            $ac = Activity::find($id);
            $ac->delete();
            return response()->json('Success removed', 200);
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }


}
