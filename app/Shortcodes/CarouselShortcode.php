<?php
namespace App\Shortcodes;

class CarouselShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $items = glob(public_path($shortcode->directory) . '/*.{jpg,png,gif}', GLOB_BRACE);
        $carouselId = 'carousel-' . str_replace('/', '-', $shortcode->directory);
        $template = $shortcode->template ?? 'carousel';
        return view('shortcodes.carousel', compact('shortcode', 'items', 'carouselId', 'template'));
    }
}