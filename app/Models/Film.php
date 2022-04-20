<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Storage;

class Film extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */


    public function getSmallPosterAttribute() {
        return "storage/{$this->poster}/200.webp";
    }

    public function getSmallFrameAttribute() {
        return "storage/{$this->frame}/800.webp";
    }

    protected $casts = [
        'info' => 'array',
    ];

    protected $attributes = [];

    protected $guarded = [];

    public function getSlugTitleAttribute() {
        return STR::slug($this->title, "-");
    }

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
            $film->deletePoster();
            $film->deleteFrame();
            $film->delete();
        });
    }

    public function deletePoster() {
        if (isset($this->poster)) {
            $dir ="public/{$this->poster}";
            $this->deleteDirectory($dir);
            $this->poster = null;
            $this->save();
        }
    }

    public function deleteFrame() {
        if (isset($this->frame)) {
            $dir = "public/{$this->frame}";
            $this->deleteDirectory($dir);
            $this->frame = null;
            $this->save();
        }
    }

    private function deleteDirectory($dir) {
        $files = Storage::files($dir);
        Storage::delete($files);
        Storage::deleteDirectory($dir);
    }
}
