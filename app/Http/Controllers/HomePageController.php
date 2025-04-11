<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeTextRequest;
use App\Models\HomeText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomePageController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = HomeText::find(1);
        return view("pages.admin.homePage", ['home'=>$home]);
    }


    public function update(HomeTextRequest $request, string $id)
    {
        try{
            $home = HomeText::find($id);
            $home->heading = $request->heading;
            $home->text1 = $request->text1;
            $home->text2 = $request->text2;
            if($request->image){
                $newName = time() . "." . $request->image->extension();
                $request->image->move(public_path("images/home/"), $newName);
                $home->image = $newName;
            }

            $home->save();

            return redirect()->route('homePage');
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }


}
