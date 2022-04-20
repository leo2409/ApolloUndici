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

    public function getSlugNameAttribute() {
        return STR::slug($this->name, "-");
    }

    public function getMediumCoverAttribute() {
        return "storage/festivals/{$this->cover}/800.webp";
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
