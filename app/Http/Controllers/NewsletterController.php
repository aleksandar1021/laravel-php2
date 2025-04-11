<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;
use App\Models\TablePremiumLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsletterController extends BaseController
{
    public function subscribe(Request $request){
        try{
            $email = $request->email;
            $email = Newsletter::where('email', $email)->first();

            if ($email) {
                return response()->json(['message' => 'Email already exists'], 200);
            }else{
                $newLoggedUser = new Newsletter();
                $newLoggedUser->email = $request->email;
                $newLoggedUser->save();
            }

            return response()->json(['message' => 'Login on newsletter is successful'], 200);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }


    public function index()
    {
        $newsletter = Newsletter::all();
        return view("pages.admin.newsletter", ['newsletter'=> $newsletter]);
    }


    public function create()
    {
        return view("pages.admin.addSubscriber", ['subscriber'=>null]);
    }

    public function store(NewsletterRequest $request)
    {
        try{
            $newSub = new Newsletter();
            $newSub->email = $request->email;
            $newSub->save();

            return redirect()->route("newsletter");
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }

    public function edit(string $id)
    {
        $subscriber = Newsletter::find($id);
        return view("pages.admin.addSubscriber", ['subscriber'=>$subscriber]);
    }


    public function update(Request $request, string $id)
    {
        try{
            $sub = Newsletter::find($id);
            $sub->email = $request->email;
            $sub->save();

            return redirect()->route("newsletter");
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $sub = Newsletter::find($id);
            $sub->delete();
            return response()->json("success removed", 200);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }
}
