<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function reservationLines()
    {
        return $this->hasMany(ReservationLine::class, 'id_reservation');
    }

    public function user()
    {
        return $this->belongsTo(OurUser::class, 'id_user');
    }
    use HasFactory;
}
