<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    protected $attributes = [];

    protected $casts = [
        'info' => 'array',
    ];

    // ACCESSORS
    /**
     * @var mixed
     */

    public function getTimeAttribute($time) {
        return Carbon::parse($time)->translatedFormat('H:i');
    }

    public function getDateReadableAttribute() {
        $date = Carbon::parse($this->date);
        if ($date->format('Y-m-d') === today()->format('Y-m-d')) {
            return "Oggi";
        } elseif ($date->format('Y-m-d') === Carbon::tomorrow()->format('Y-m-d')) {
            return "Domani";
        } else {
            return ucwords(Carbon::parse($this->date)->translatedFormat('l j M'));
        }
    }

    public function getCarbonDateAttribute() {
        return Carbon::parse($this->date);
    }


    //RELETATIONSHIPS
    public function film() {
        return $this->belongsTo(Film::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
