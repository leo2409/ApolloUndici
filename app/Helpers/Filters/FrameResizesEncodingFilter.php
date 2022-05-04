<?php
namespace App\Helpers\Filters;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class FrameResizesEncodingFilter implements FilterInterface {

    private $path;

    public function __construct($path) {
        $this->path = $path;
    }

    public function applyFilter(Image $image)
    {
        $image->backup();

        $image->resize(1000,null, function ($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        })->save($this->path . '/1000.jpg');

        $image->reset();

        $image->resize(500,null, function ($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        })->save($this->path . '/500.webp');

        $image->reset();

        $image->resize(1000,null, function ($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        })->save($this->path . '/1000.webp');
    }
}
