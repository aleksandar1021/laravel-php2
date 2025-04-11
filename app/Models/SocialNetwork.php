<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    public function chefs()
    {
        return $this->belongsToMany(Chef::class, 'social_network_users', 'id_social', 'id');
    }
    use HasFactory;
}
