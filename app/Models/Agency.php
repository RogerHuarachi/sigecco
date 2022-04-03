<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $fillable = [
        'id', 'codigo', 'name', 'autonomy', 'city_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function arqueos()
    {
        return $this->hasMany(Arqueo::class);
    }
}
