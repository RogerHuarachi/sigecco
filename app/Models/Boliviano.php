<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boliviano extends Model
{
    protected $fillable = [
        'arqueo_id', 'docientos', 'cien', 'cincuenta', 'veinte',
        'diez', 'cinco', 'dos', 'uno', 'cincuentacent',
        'veintecent', 'diezcent', 'totalbs',
    ];

    public function arqueo()
    {
        return $this->belongsTo(Arqueo::class);
    }
}
