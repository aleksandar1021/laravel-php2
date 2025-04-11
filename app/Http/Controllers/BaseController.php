<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Menu;
use Couchbase\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BaseController extends Controller
{
    public function __construct()
    {
         view()->share('menu', $this->menu = Menu::all());
    }

    public function log($idType){
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $idUser = session()->get('user')->id;
        $newLog = new Activity();
        $newLog->id_type = $idType;
        $newLog->id_user = $idUser;
        $newLog->ip_address = $ipAddress;
        $newLog->save();
    }


    public function isLogin(){
        if(session()->has('user')){
            return redirect()->route("/")->send();
        }
    }
}
