<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory;

    //mutators
    public function setCfAttribute($cf) {
        $this->attributes['cf'] = strtoupper($cf);
    }

    public function setNameAttribute($name) {
        $this->attributes['name'] = ucwords(strtolower($name));
    }

    public function setEmailAttribute($email) {
        $this->attributes['email'] = strtolower($email);
    }

    public function getStatusAttribute() {
        if ($this->accepted && $this->associated_at->year == now()->year) {
            return 'attivo';
        } elseif ($this->attributes['accepted'] === 1) {
            return 'rinnovo';
        } elseif ($this->attributes['accepted'] === null) {
            return 'nuovo';
        } elseif ($this->attributes['accepted'] === 0) {
            return 'rifiutato';
        }
    }

        //relations
    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'associated_at' => 'datetime',
    ];
}
