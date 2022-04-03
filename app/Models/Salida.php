<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $fillable = [
        'arqueo_id', 'category', 'item', 'money'
    ];

    public function arqueo()
    {
        return $this->belongsTo(Arqueo::class);
    }
}
