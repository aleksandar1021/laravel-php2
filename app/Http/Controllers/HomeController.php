<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Comment;
use App\Models\HomeText;
use App\Models\OurUser;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index(){

        $comments = Comment::with("user")->where("active", 1)->get();
        $chefs = OurUser::with('socialNetworks')->where('id_role',3)->get();
        $texts = HomeText::find(1);
        //dd($chefs);
        return view("pages.home", ['comments'=>$comments, 'chefs'=>$chefs, 'texts'=>$texts]);
    }

}
