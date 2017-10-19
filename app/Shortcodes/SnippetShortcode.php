<?php
namespace App\Shortcodes;

use App\Providers\Directives\SnippetDirective;

class SnippetShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $slug = $shortcode->slug;
        $view = $shortcode->view ?? 'snippets.display';
        return SnippetDirective::display(compact('slug', 'view'));
    }
}