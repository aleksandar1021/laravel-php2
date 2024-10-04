<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NavigationController extends BaseController
{
    public function index(){
        $navigations = Menu::all();
        return view("pages.admin.navigations", ['navigations'=>$navigations]);
    }
    public function create(){
        return view("pages.admin.addLink", ['link'=>null]);
    }

    public function store(LinkRequest $request){
        try{
            $newLink = new Menu();
            $newLink->name=$request->name;
            $newLink->href=$request->link;
            $newLink->save();
            return redirect()->route("navigations");
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }
    public function edit($id){
        $link = Menu::find($id);
        return view("pages.admin.addLink", ['link'=>$link]);
    }

    public function update(LinkRequest $request, $id){
        try{
            $link = Menu::find($id);
            $link->name=$request->name;
            $link->href=$request->link;
            $link->save();
            return redirect()->route("navigations");
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

    public function destroy($id){
        try{
            $link = Menu::find($id);
            $link->delete();
            return response()->json("success removed", 200);
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

}
