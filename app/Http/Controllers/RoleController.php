<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\Activity;
use App\Models\Comment;
use App\Models\OurUser;
use App\Models\Reservation;
use App\Models\ReservationLine;
use App\Models\Role;
use App\Models\SocialNetworkUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::where('name', '<>','Admin')->get();
        return view("pages.admin.roles", ['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.addRole", ['role'=>null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LevelRequest $request)
    {
        try{
            $role = new Role();
            $role->name = $request->name;
            $role->save();
            return redirect()->route("roles");
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        return view("pages.admin.addRole", ['role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LevelRequest $request, string $id)
    {
        try{
            $role = Role::find($id);
            $role->name = $request->name;
            $role->save();
            return redirect()->route("roles");
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $usersWithRole = OurUser::where('id_role', $id)->get();

            foreach ($usersWithRole as $user) {
                $userId = $user->id;

                $reservations = Reservation::where('id_user', $userId)->get();
                foreach ($reservations as $reservation) {
                    $idRes = $reservation->id;
                    ReservationLine::where('id_reservation', $idRes)->delete();
                    $reservation->delete();
                }
                Comment::where("id_user", $userId)->delete();
                SocialNetworkUser::where('id_user', $userId)->delete();
                Activity::where("id_user", $userId)->delete();
                $user->delete();
            }

            $role = Role::find($id);
            $role->delete();
            return response()->json('Success removed',200);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }
}
