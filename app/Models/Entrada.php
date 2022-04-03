<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = [
        'arqueo_id', 'category', 'item', 'money'
    ];

    public function arqueo()
    {
        return $this->belongsTo(Arqueo::class);
    }
}
