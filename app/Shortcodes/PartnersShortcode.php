<?php

namespace App\Shortcodes;

class PartnersShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $items = glob(public_path('files/partners') . '/*.{jpg,png,gif}', GLOB_BRACE);
        return view('shortcodes.partners', compact('shortcode', 'items'));
    }
}