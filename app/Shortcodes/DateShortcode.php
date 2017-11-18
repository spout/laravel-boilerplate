<?php
namespace App\Shortcodes;

class DateShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return date($shortcode->format, $shortcode->timestamp ?? time());
    }
}