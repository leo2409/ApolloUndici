<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // ACCESSORS
    /**
     * @var mixed
     */

    public function getTimeAttribute($time) {
        return Carbon::parse($time)->format('H:i');
    }

    public function getHomeAttribute() {
        return Carbon::parse($this->date)->format('l j M');
    }


    //RELETATIONSHIPS
    public function film() {
        return $this->belongsTo(Film::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
