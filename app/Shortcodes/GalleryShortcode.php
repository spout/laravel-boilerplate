<?php

namespace App\Shortcodes;

use App\Models\Gallery;

class GalleryShortcode
{
    public static $config = [
        'template' => [
            'default' => 'large'
        ],
    ];

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        if (!is_null($shortcode->id)) {
            $gallery = Gallery::find($shortcode->id);
        } elseif (!is_null($shortcode->slug)) {
            $gallery = Gallery::where('slug', $shortcode->slug)->first();
        } else {
            $gallery = null;
        }

        $template = $shortcode->template ?? static::$config['template']['default'];
        return view('shortcodes.gallery', compact('shortcode', 'gallery', 'template'));
    }
}