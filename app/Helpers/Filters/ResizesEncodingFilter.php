<?php
namespace App\Helpers\Filters;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ResizesEncodingFilter implements FilterInterface {

    private $path;

    public function __construct($path) {
        $this->path = $path;
    }

    public function applyFilter(Image $image)
    {
        $image->backup();

        $image->resize(400,null, function ($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        })->save($this->path . '/400.jpg');

        $image->reset();

        $image->resize(200,null, function ($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        })->save($this->path . '/200.webp');

        $image->reset();

        $image->resize(400,null, function ($contraint) {
            $contraint->aspectRatio();
            $contraint->upsize();
        })->save($this->path . '/400.webp');
    }
}
