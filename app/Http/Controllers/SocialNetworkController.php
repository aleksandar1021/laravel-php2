<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Http\Requests\SocialRequest;
use App\Models\Menu;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SocialNetworkController extends BaseController
{
    public function index()
    {
        $networks = SocialNetwork::all();
        return view("pages.admin.networks", ['networks'=>$networks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.addNetwork", ['network'=>null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LevelRequest $request)
    {
        try{
            $newNetwork = new SocialNetwork();
            $newNetwork->name=$request->name;
            $newNetwork->icon=$request->icon;
            $newNetwork->save();
            return redirect()->route("networks");
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $network = SocialNetwork::find($id);
        return view("pages.admin.addNetwork", ['network'=>$network]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialRequest $request, string $id)
    {
        try{
            $network = SocialNetwork::find($id);
            $network->name=$request->name;
            $network->icon=$request->icon;
            $network->save();
            return redirect()->route("networks");
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $network = SocialNetwork::find($id);
            $network->delete();
            return response()->json("success removed", 200);
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }
}
