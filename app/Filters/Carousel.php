<?php
namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Carousel implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(1140, 380);
    }
}