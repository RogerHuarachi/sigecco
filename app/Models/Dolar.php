<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dolar extends Model
{
    protected $fillable = [
        'arqueo_id', 'ciend', 'cincuentad', 'viented', 'diezd',
        'cincod', 'dosd', 'unod', 'totald',
    ];

    public function arqueo()
    {
        return $this->belongsTo(Arqueo::class);
    }
}
