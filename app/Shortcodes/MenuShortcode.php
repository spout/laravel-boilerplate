<?php

namespace App\Shortcodes;

use App\Providers\Directives\MenuDirective;

class MenuShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $slug = $shortcode->slug;
        $view = $shortcode->view ?? 'menus.display';
        return MenuDirective::display(compact('slug', 'view'));
    }
}