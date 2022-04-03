<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'agency_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function folders()
    {
        return $this->hasMany(Folder::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function disbursements()
    {
        return $this->hasMany(Disbursement::class);
    }

    public function approveds()
    {
        return $this->hasMany(Approved::class);
    }

    public function observeds()
    {
        return $this->hasMany(Observed::class);
    }

    public function rejecteds()
    {
        return $this->hasMany(Rejected::class);
    }

    public function assigns()
    {
        return $this->hasMany(Assign::class);
    }

    public function arqueos()
    {
        return $this->hasMany(Arqueo::class);
    }
}
