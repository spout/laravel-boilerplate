<?php
namespace App\Shortcodes;

class RowShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return '<div class="row">' . $content . '</div>';
    }
}