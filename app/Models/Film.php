<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Film extends Model
{
    use HasFactory;


    public function setSlugAttribute($value) {
        if (isset($this->slug) && Storage::exists("public/films/{$this->slug}")) {
            if ($value != $this->slug)
            Storage::move("public/films/{$this->slug}", "public/films/{$value}");
        } else {
            Storage::makeDirectory("public/films/{$value}");
            Storage::makeDirectory("public/films/{$value}/poster");
            Storage::makeDirectory("public/films/{$value}/frame");
        }
        $this->attributes['slug'] = $value;
    }

    public function getSmallPosterAttribute(): string
    {
        return "storage/films/{$this->slug}/poster/200.webp";
    }

    public function getSmallFrameAttribute(): string
    {
        return "storage/films/{$this->slug}/frame/1000.webp";
    }

    protected $casts = [
        'info' => 'array',
    ];

    protected $attributes = [];

    protected $guarded = [];

    // RELETIONSHIPS
    public function events() {
        return $this->hasMany(Event::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted() {

        static::deleted(function ($film) {
            $film->deleteDirectoryFilm();
            $film->delete();
        });

    }

    public function deleteDirectoryFilm() {
        $dir = "public/films/{$this->slug}";
        $this->deleteDirectory($dir);
    }

    public function deletePoster() {
        $dir = "public/films/{$this->slug}/poster";
        $this->deleteFiles($dir);
    }

    public function deleteFrame() {
        $dir = "public/films/{$this->slug}/frame";
        $this->deleteFiles($dir);
    }

    private function deleteFiles($dir) {
        $files = Storage::files($dir);
        Storage::delete($files);
    }

    private function deleteDirectory($dir) {
        $this->deleteFiles($dir);
        Storage::deleteDirectory($dir);
    }
}
