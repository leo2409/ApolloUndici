<?php
namespace App\Helpers\Filters;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class FrameResizesEncodingFilter implements FilterInterface {

    private $extension;
    private $path;

    public function __construct($extension, $path) {
        $this->extension = $extension;
        $this->path = $path;
    }

    public function applyFilter(Image $image)
    {
        if (!file_exists($this->path)) {
            mkdir($this->path);
        }
        $image->backup();
        $image->save($this->path . '/original.' . $this->extension);
        $image->resize(500,null, function ($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        })->save($this->path . '/500.webp');
        $image->reset();
        $image->resize(800,null, function ($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        })->save($this->path . '/800.webp');
    }
}
