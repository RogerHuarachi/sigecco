<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arqueo extends Model
{
    protected $fillable = [
        'agency_id', 'user_id', 'date', 'tc'
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function salidas()
    {
        return $this->hasMany(Salida::class);
    }

    public function boliviano()
    {
        return $this->hasOne(Boliviano::class);
    }

    public function dolar()
    {
        return $this->hasOne(Dolar::class);
    }
}
