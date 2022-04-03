<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = [
        'name', 'gender', 'money', 'term', 'report', 'user_id', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function disbursement()
    {
        return $this->hasOne(Disbursement::class);
    }

    public function approved()
    {
        return $this->hasOne(Approved::class);
    }

    public function observed()
    {
        return $this->hasOne(Observed::class);
    }

    public function rejected()
    {
        return $this->hasOne(Rejected::class);
    }

    public function assign()
    {
        return $this->hasOne(Assign::class);
    }
}
