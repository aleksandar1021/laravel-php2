<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\OurUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SignupController extends BaseController
{
    public function index(){
        $this->isLogin();
        return view("pages.signup");
    }


    public function signup(SignupRequest $request){
        try{
            $user = new OurUser();
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->id_role = 1;
            $user->active = 1;
            $user->save();
            return redirect()->route("signin");
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }

}
