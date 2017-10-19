<?php
namespace App\Providers\Directives;

use App\Models\Snippet;

class SnippetDirective
{
    public static function display($expression)
    {
        $snippet = Snippet::where('slug', $expression['slug'])->first();
        $view = $expression['view'] ?? 'snippets.display';
        return view($view, compact('snippet'));
    }
}