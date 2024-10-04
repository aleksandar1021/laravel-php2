<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function user(){
        return $this->belongsTo(OurUser::class, 'id_user');
    }
    public function type(){
        return $this->belongsTo(TypeOfActivity::class, 'id_type');
    }

    public function filter($start, $end){
        $activities = Activity::query()->with('user', 'type')
            ->whereBetween('created_at', [$start, $end])
            ->paginate(10)
            ->withQueryString();

        return $activities;
    }

    use HasFactory;
}
