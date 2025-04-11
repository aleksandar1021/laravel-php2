<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Models\MealCategory;
use App\Models\NumberOfChairs;
use App\Models\TablePremiumLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GalleryAdminController extends BaseController
{
    public function index(){
        $galleries = Gallery::with('category')->get();
        return view("pages.admin.galleries", ['galleries'=>$galleries]);
    }

    public function create(){
        $categories = MealCategory::all();
        return view("pages.admin.addGallery", ['gallery'=>null, 'categories'=>$categories]);
    }

    public function store(GalleryRequest $request){
        try{
            $newGallery = new Gallery();
            $newGallery->name = $request->name;
            $newGallery->description = $request->description;
            $newGallery->id_category = $request->category;

            if($request->file('image')){
                $newName = time(). "." . $request->image->extension();
                $request->image->move(public_path("images/gallery/"), $newName);
                $newGallery->image = $newName;
            }

            if($newGallery->save()){
                return redirect()->route("galleries");
            }


        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }

    }

    public function destroy($id){
        try{
            $gallery = Gallery::find($id);
            $gallery->delete();
            return response()->json("success removed", 200);
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }

    public function edit($id){
        $gallery = Gallery::find($id);
        $categories = MealCategory::all();
        return view("pages.admin.addGallery", ['gallery'=>$gallery, 'categories'=>$categories]);
    }

    public function update(UpdateGalleryRequest $request,$id){
        try{
            //dd($request->image->getClientOriginalName());
            $gallery = Gallery::find($id);
            $gallery->name = $request->name;
            $gallery->description = $request->description;
            $gallery->id_category = $request->category;
            if($request->image){
                $newName = time() . "." . $request->image->extension();
                $request->image->move(public_path("images/gallery/"), $newName);
                unlink("images/gallery/".$gallery->image);
                $gallery->image = $newName;
            }

            $gallery->save();
            return redirect()->route("galleries");
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }

}
