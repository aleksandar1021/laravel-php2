<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Activity;
use App\Models\OurUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SigninController extends BaseController
{
    public function index(){
        $this->isLogin();
        return view("pages.signin");
    }

    public function signin(Request $request){
        try{
            $email = $request->email;
            $password = $request->password;
            $user = OurUser::where("email", $email)->first();
            if(!$user) {
                return redirect()->back()->with("error", "Wrong credentials")->withInput();
            }
            if(!Hash::check($password, $user->password)) {
                return redirect()->route("signin")->with("error", "Wrong credentials")->withInput();
            }
            if(!$user->active) {
                return redirect()->route("signin")->with("error", "The account has been deactivated, contact the administrator")->withInput();
            }

            $request->session()->put("user", $user);
            $this->log(1);
            return redirect()->route("reservation");
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }

    }

    public function logout(Request $request){
        $this->log(2);
        $request->session()->forget("user");
        return redirect()->route('signin');
    }
}
