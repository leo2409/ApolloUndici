<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Event extends Model implements Sitemapable
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
            return ucwords(Carbon::parse($this->date)->translatedFormat('l j F'));
        }
    }

    public function getCarbonDateAttribute() {
        return Carbon::parse($this->date);
    }


    //RELETIONSHIPS
    public function film() {
        return $this->belongsTo(Film::class);
    }

    public function festival() {
        return $this->belongsTo(Festival::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    public function toSitemapTag(): Url|string|array
    {
        $url =  Url::create(route('film.info', ['film' => $this->film->slug, 'event' => $this->id]))
            ->setLastModificationDate($this->updated_at);

        if ($this->carbon_date->gt(now()))  {
            $url->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.8);
        } else {
            $url->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.4)->setUrl();
        }
        return $url;
    }
}
