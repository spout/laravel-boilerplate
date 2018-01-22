<?php

namespace App\Shortcodes;

use Embed\Embed;

class VideoShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $embed = Embed::create(trim($content));
        $ratio = $shortcode->ratio ?? '16by9';
        return view('shortcodes.video', compact('embed', 'ratio'));
    }
}