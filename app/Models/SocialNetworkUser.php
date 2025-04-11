<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetworkUser extends Model
{
    public function network(){
        return $this->belongsTo(SocialNetwork::class, 'id_social');
    }
    use HasFactory;
}
