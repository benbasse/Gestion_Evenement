<?php

namespace App\Models;
use Illuminate\Foundation\Auth\Client as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Authenticatable
{
    use HasFactory;
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
}