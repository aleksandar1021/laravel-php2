<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\MealCategory;
use Illuminate\Http\Request;

class GalleryController extends BaseController
{
    public function index(Request $request){
        $images = Gallery::with('category')->paginate(6)->withQueryString();
        $categories = MealCategory::all();

        $galleryModel = new Gallery();

        return view("pages.gallery", ['images'=>$galleryModel->filter($request->search, $request->category),
                          'categories'=>$categories,
                          'input'=>$request->search,
                          'selectedCategory'=>$request->category]);
    }

}
