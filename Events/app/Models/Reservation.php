<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        "client_id",
        "evenement_id",
        "references",
        "nombre_place"
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

    protected $casts = [
        '1', 'Accepeter',
        '0', 'Refuser'
    ];
}
