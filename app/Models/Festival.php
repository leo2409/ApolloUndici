<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Festival extends Model
{
    use HasFactory;

    protected $attributes = [];

    protected $guarded = [];

    protected $casts = [
        'organizers' => 'array',
    ];

    public function getSlugNameAttribute() {
        return STR::slug($this->name, "-");
    }

    public function getMediumCoverAttribute() {
        return "storage/festivals/{$this->cover}/500.webp";
    }

    public function deleteCover() {
        if (isset($this->cover)) {
            $dir = storage_path("app/public/festivals/{$this->cover}");
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
