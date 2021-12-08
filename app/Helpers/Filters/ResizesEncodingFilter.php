<?php
namespace App\Helpers\Filters;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ResizesEncodingFilter implements FilterInterface {

    private $extension;
    private $path;

    public function __construct($extension, $path) {
        $this->extension = $extension;
        $this->path = $path;
    }

    public function applyFilter(Image $image)
    {
        mkdir($this->path);
        $image->backup();
        $image->save($this->path . '/original' . $this->extension);
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
