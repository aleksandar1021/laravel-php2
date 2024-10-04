<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class ContactController extends BaseController
{
    public function index(){
        return view("pages.contact");
    }

    public function store(ContactRequest $request)
    {
        try{
            $message = new Message();
            $message->name = $request->name;
            $message->email = $request->email;
            $message->message = $request->message;

            if($message->save()){
                return response()->json(['message' => 'The message was sent successfully'], 200);
            }else{
                return response()->json(['message' => 'Network error']);
            }
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }

    }

    public function showAll(){
        $messages = Message::all();
        return view("pages.admin.messages", ['messages'=>$messages]);
    }

    public function destroy($id){
        try{
            $message = Message::find($id);
            $message->delete();
            return response()->json("success removed", 200);
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

}
