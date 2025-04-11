<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function premiumLevel(){
        return $this->belongsTo(TablePremiumLevel::class, 'id_level');
    }

    public function reservations(){
        return $this->hasMany(ReservationLine::class, 'id_table');
    }

    public function chairNumbers(){
        return $this->belongsTo(NumberOfChairs::class, 'id_number');
    }

    public function filter($search, $premiumCategory, $numberCategory, $sort){
        $tables = Table::query()->with("premiumLevel", "chairNumbers");

        if ($search != "") {
            $tables->where('description', 'LIKE', '%' . strtolower($search) . '%')
                     ->orWhere('name', 'LIKE', '%' . strtolower($search) . '%');
        }

        if ($premiumCategory) {
            $tables->whereIn('id_level', $premiumCategory);
        }

        if ($numberCategory) {
            $tables->whereIn('id_number', $numberCategory);
        }

        if ($sort) {
            $tables->orderBy('description', $sort);
        }

        return response()->json($tables->get());
    }

    use HasFactory;
}
