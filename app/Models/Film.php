<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Film extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */


    public function getSmallPosterAttribute() {
        return 'storage/' . $this->poster . '/200.webp';
    }

    protected $casts = [
        'info' => 'array',
    ];

    protected $attributes = [];

    protected $guarded = [];

    public function getSlugTitleAttribute() {
        return STR::slug($this->title, "-");
    }

    public function events() {
        return $this->hasMany(Event::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted() {

        static::deleted(function ($user) {
            $user->deletePoster();
        });
    }

    public function deletePoster() {
        if (isset($this->poster)) {
            $dir = storage_path("app/public/{$this->poster}");
            $this->deleteDirectory($dir);
            $this->poster = null;
            $this->save();
        }
    }

    private function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }

        }

        return rmdir($dir);
    }
}
