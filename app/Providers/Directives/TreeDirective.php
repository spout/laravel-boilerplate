<?php
namespace App\Providers\Directives;

class TreeDirective
{
    public static function display($expression)
    {
        $view = empty($expression['view']) ? 'tree.display' : $expression['view'];
        $tag = empty($expression['tag']) ? 'ul' : $expression['tag'];
        $tree = $expression['tree'];

        if ($tree->count()) {
            echo "<{$tag}>";
            foreach ($tree as $node) {
                echo view($view, compact('node', 'view', 'tag'));
            }
            echo "</{$tag}>";
        }
    }
}