<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\TablePremiumLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends BaseController
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $newComment = new Comment();

            $userId = session("user")['id'];
            $newComment->subject = $request->subject;
            $newComment->message = $request->message;
            $newComment->active = 0;
            $newComment->id_user = $userId;

            if($newComment->save()){
                $this->log(6);
                return response()->json(['message' => 'Comment sent successfully'], 200);
            }else{
                return response()->json(['message' => 'Network error']);
            }
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }

    }

    public function index(){
        $comments = Comment::with("user")->get();
        return view("pages.admin.comments", ['comments'=>$comments]);
    }

    public function changeStatus($id){
        $comment = Comment::find($id);
        $status = $comment->active==1 ? $status = 0 : $status = 1;
        $comment->active=$status;
        $comment->save();
        return redirect()->route("comments");
    }

    public function destroy($id){
        try {
            $comment = Comment::find($id);
            $comment->delete();
            return response()->json("success removed", 200);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }


}
