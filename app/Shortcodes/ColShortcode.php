<?php
namespace App\Shortcodes;

class ColShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return '<div ' . $shortcode->get('class', 'col-sm-12') . '>' . $content . '</div>';
    }
}