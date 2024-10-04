<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Activity;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\OurUser;
use App\Models\Reservation;
use App\Models\ReservationLine;
use App\Models\Role;
use App\Models\SocialNetworkUser;
use App\Models\Table;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class UserController extends BaseController
{
    public function index(){
        $users = OurUser::with("role")->where('email','<>',"administrator@gmail.com")->get();
        return view("pages.admin.users", ['users'=>$users]);
    }

    public function create(){
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



        return view("pages.admin.addUser", ['user'=>null, 'roles'=>$roles, 'status' => $status, 'route'=>$routeName]);
    }

    public function store(UserRequest $request){
        try{
            $newUser = new OurUser();
            $newUser->name = $request->name;
            $newUser->lastname = $request->lastname;
            $newUser->email = $request->email;
            $newUser->id_role = $request->role;
            $newUser->password = bcrypt($request->password);
            $newUser->active = $request->status;

            if($request->image){
                $newName = time() . "." . $request->image->extension();
                $request->image->move(public_path("images/chefs"), $newName);
                $newUser->image = $newName;
            }
            $newUser->save();

            return redirect()->route("users");
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

    public function edit($id){
        $user = OurUser::with("role")->where('id',$id)->get();
        $statusValues = [
            ['value' => '0', 'text' => 'Inactive'],
            ['value' => '1', 'text' => 'Active']
        ];
        $status = array_map(function ($item) {
            return (object)$item;
        }, $statusValues);

        //dd($user[0]->active);

        $route = Route::current();
        $routeName = $route->getName();

        $roles = Role::all();
        return view("pages.admin.addUser", ['user'=>$user, 'roles'=>$roles, 'status' => $status, 'route'=>$routeName]);
    }

    public function update(UpdateUserRequest $request ,$id){
        try{
            $user = OurUser::find($id);
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->id_role = $request->role;
            $user->active = $request->status;

            if($request->password){
                $user->password = bcrypt($request->password);
            }

            if($request->image){
                $newName = time() . "." . $request->image->extension();
                $request->image->move(public_path("images/chefs"), $newName);
                if($request->image->getClientOriginalName() != "avatar2.png"){
                    unlink("images/chefs/".$user->image);
                }
                $user->image = $newName;
            }
            $user->save();

            return redirect()->route("users");
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
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
            Activity::where('id_user', $id)->delete();
            $user->delete();

            return response()->json("success removed", 200);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

}
