<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\Gallery;
use App\Models\MealCategory;
use App\Models\TablePremiumLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends BaseController
{

    public function index()
    {
        $categories = MealCategory::all();
        return view("pages.admin.categories", ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.addCategory", ['category'=>null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LevelRequest $request)
    {
        try{
            $newCategory = new MealCategory();
            $newCategory->name = $request->name;
            $newCategory->save();

            return redirect()->route("categories");
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = MealCategory::find($id);
        return view('pages.admin.addCategory',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LevelRequest $request, string $id)
    {
        try{
            $category = MealCategory::find($id);
            $category->name = $request->name;
            $category->save();

            return redirect()->route("categories");
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again",500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = MealCategory::find($id);
            Gallery::where('id_category', $id)->delete();
            $category->delete();
            return response()->json("success removed", 200);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }
}
