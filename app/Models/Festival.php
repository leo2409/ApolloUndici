<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;
use Storage;

class Festival extends Model implements Sitemapable
{
    use HasFactory;

    protected $attributes = [];

    protected $guarded = [];

    protected $casts = [
        'organizers' => 'array',
    ];

    public function getMediumCoverAttribute(): string
    {
        return "storage/festivals/{$this->slug}/cover/1000.webp";
    }

    protected static function booted() {

        static::deleted(function ($festival) {
            $festival->deleteDirectoryFestival();
            $festival->delete();
        });
    }

    //RELETIONSHIPS
    public function events() {
        return $this->hasMany(Event::class);
    }

    public function makeDirectoryFestival($slug) {
        Storage::makeDirectory("public/festivals/{$slug}");
        Storage::makeDirectory("public/festivals/{$slug}/cover");
    }

    public function renameDirectoryFestival($slug) {
        if (Storage::exists("public/festivals/{$this->slug}")) {
            if ($slug != $this->slug) {
                Storage::move("public/festivals/{$this->slug}", "public/festivals/{$slug}");
            }
        } else {
            $this->makeDirectoryFestival($slug);
        }
    }

    public function deleteDirectoryFestival() {
        $dir = "public/festival/{$this->slug}";
        $this->deleteDirectory($dir);
    }

    public function deleteCover() {
        $dir = "public/festivals/{$this->slug}/cover";
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

    public function toSitemapTag(): Url|string|array
    {
        $url =  Url::create(route('rassegne.show', ['festival' => $this->slug]))
            ->setLastModificationDate($this->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8);
        return $url;
    }
}
