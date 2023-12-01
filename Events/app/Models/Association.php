<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Association extends Authenticatable
{
    use HasFactory;
    public function evenement()
    {
        return $this->hasMany(Evenement::class);
    }
    protected $fillable = [
        'nom',
        'date_creation',
        'email',
        'mot_de_passe',
        'slogan',
        'logo',
    ];

}
