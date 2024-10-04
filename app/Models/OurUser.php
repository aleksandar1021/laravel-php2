<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurUser extends Model
{
    public function socialNetworks()
    {
        return $this->belongsToMany(SocialNetwork::class, 'social_network_users', 'id_user', 'id_social')->withPivot('href');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'id_role');
    }
    public function reservationLines()
    {
        return $this->hasMany(ReservationLine::class, 'id_user');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    protected $fillable = ['name', 'lastname', 'email', 'password','active', 'id_role'];
    use HasFactory;
}
