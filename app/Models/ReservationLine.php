<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationLine extends Model
{
    public function table()
    {
        return $this->belongsTo(Table::class, 'id_table');
    }
    public function user()
    {
        return $this->belongsTo(OurUser::class, 'id_user');
    }
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'id_reservation');
    }
    use HasFactory;
}
