<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChefRequest;
use App\Http\Requests\ChefUpdateController;
use App\Http\Requests\NetworkUserEntryRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Chef;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\OurUser;
use App\Models\Reservation;
use App\Models\ReservationLine;
use App\Models\Role;
use App\Models\SocialNetwork;
use App\Models\SocialNetworkUser;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class ChefController extends BaseController
{
    public function index(){
        $chefs = OurUser::with("role")->where('id_role',3)->get();
        return view("pages.admin.chefs", ['chefs'=>$chefs]);
    }

    public function create(){
        $statusValues = [
            ['value' => '0', 'text' => 'Active'],
            ['value' => '1', 'text' => 'Inactive']
        ];
        $status = array_map(function ($item) {
            return (object)$item;
        }, $statusValues);

        $route = Route::current();
        $routeName = $route->getName();

        $roles = Role::all();
        return view("pages.admin.addUser", ['user'=>null, 'roles'=>$roles, 'status' => $status, 'route'=>$routeName]);
    }

    public function store(UserRequest $request){

    }

    public function edit($id){
        $user = OurUser::with("role")->where('id',$id)->get();
        $statusValues = [
            ['value' => '0', 'text' => 'Active'],
            ['value' => '1', 'text' => 'Inactive']
        ];
        $status = array_map(function ($item) {
            return (object)$item;
        }, $statusValues);
        $roles = Role::all();

        $route = Route::current();
        $routeName = $route->getName();
        return view("pages.admin.addUser", ['user'=>$user, 'roles'=>$roles, 'status' => $status, 'route'=>$routeName]);
    }

    public function update(ChefRequest $request ,$id){
        try{
            $user = OurUser::find($id);
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;

            if($request->image){
                $newName = time() . "." . $request->image->extension();
                $request->image->move(public_path("images/chefs"), $newName);
                $user->image = $newName;
            }
            $user->save();

            return redirect()->route("chefs");
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response("An error occurred, please try again", 500);
        }
    }

    public function destroy($id){
        try {
            $user = OurUser::find($id);

            $reservations = Reservation::where('id_user', $id)->get();

            foreach($reservations as $res){
                $idRes = $res->id;
                $reservationLines = ReservationLine::where('id_reservation', $idRes)->get();
                foreach($reservationLines as $r){
                    $r->delete();
                }
                $res->delete();
            }

            $comments = Comment::where("id_user", $id)->get();
            foreach($comments as $c){
                $c->delete();
            }

            $networks = SocialNetworkUser::where('id_user', $id)->get();
            foreach ($networks as $n){
                $n->delete();
            }

            $user->delete();

            return response()->json("success removed", 200);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

    public function show($id){
        $networks = SocialNetworkUser::with('network')->where('id_user', $id)->get();
        //dd($networks);
        return view('pages.admin.viewNetworks', ['networks'=>$networks, 'id'=>$id]);
    }

    public function createNetwork($id){
        $networks = SocialNetwork::all();
        return view('pages.admin.addNetworkForChef', ['chef'=>null, 'networks'=>$networks, 'id'=>$id]);
    }

    public function storeNetwork(NetworkUserEntryRequest $request){
        try {
            $newLink = new SocialNetworkUser();
            $newLink->href = $request->link;
            $newLink->id_user = $request->id;
            $newLink->id_social = $request->network;
            $newLink->save();

            return redirect()->route("viewNetworksForChef", ['id'=>$request->id]);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

    public function editNetwork($id , $idUser){
        $networks = SocialNetwork::all();
        $chefNetwork = SocialNetworkUser::with('network')->where('id', $id)->get();
        //dd($chefNetwork);
        return view("pages.admin.addNetworkForChef", ['chef'=>$chefNetwork, 'networks'=>$networks, 'id'=>$id, 'idUser'=>$idUser]);
    }

    public function updateNetwork(NetworkUserEntryRequest $request,$id){
        try{
            $network = SocialNetworkUser::find($id);
            $network->href = $request->link;
            $network->id_social = $request->network;
            $network->save();

            return redirect()->route("viewNetworksForChef", ['id'=>$request->idUser]);
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response("An error occurred, please try again", 500);
        }
    }

    public function destroyNetwork($id){
        try {
            $network = SocialNetworkUser::find($id);
            $network->delete();

            return response()->json("success removed", 200);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }


}
