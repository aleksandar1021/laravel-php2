<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function filter($search, $category){
        $images = Gallery::query();

        if ($search != "") {
            $images->where('name', 'LIKE', '%' . strtolower($search) . '%');
        }
        $category==-1?$category=0:$category;
        if ($category) {
            $images->where('id_category', $category);
        }

        return $images->paginate(6)->withQueryString();
    }


    public function category()
    {
        return $this->belongsTo(MealCategory::class , "id_category");
    }
    protected $fillable = ['name', 'description', 'id_category'];
    use HasFactory;
}
