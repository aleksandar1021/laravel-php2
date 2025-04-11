<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\OurUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AccountController extends BaseController
{
    public function index(){
        $user = OurUser::find(session()->get('user')->id);
        return view("pages.account", ['user'=>$user]);
    }


    public function update(AccountRequest $request, string $id)
    {
        try{
            $user = OurUser::find($id);
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;

            if($request->password){
                $user->password = bcrypt($request->password);
            }
            if($request->image){
                $newName = time() . "." . $request->image->extension();
                $request->image->move(public_path("images/chefs"), $newName);
                $user->image = $newName;
            }
            $user->save();

            return back()->with('success', "Success edited your account");
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response("An error occurred, please try again", 500);
        }
    }


}
