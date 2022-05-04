<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Storage;

class Festival extends Model
{
    use HasFactory;

    protected $attributes = [];

    protected $guarded = [];

    protected $casts = [
        'organizers' => 'array',
    ];

    public function getMediumCoverAttribute(): string
    {
        return "storage/festivals/{$this->cover}/1000.webp";
    }

    protected static function booted() {

        static::deleted(function ($film) {
            $film->deleteCover();
            $film->delete();
        });
    }

    public function deleteCover() {
        if (isset($this->cover)) {
            $dir = "public/festivals/{$this->cover}";
            $this->deleteDirectory($dir);
            $this->cover = null;
            $this->save();
        }
    }

    //RELETIONSHIPS
    public function events() {
        return $this->hasMany(Event::class);
    }

    private function deleteDirectory($dir) {
        $files = Storage::files($dir);
        Storage::delete($files);
        Storage::deleteDirectory($dir);
    }
}
