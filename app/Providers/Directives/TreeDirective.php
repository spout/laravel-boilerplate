<?php

namespace App\Providers\Directives;

class TreeDirective
{
    public static function display($expression)
    {
        $defaultParams = [
            'view' => 'tree.display',
            'level' => 0,
            'tag' => 'ul',
            'attributes' => [],
            'extraData' => [],
        ];

        $params = array_merge($defaultParams, $expression['params'] ?? []);

        if (!empty($expression['tree'])) {
            $tree = $expression['tree'];

            if ($tree->count()) {
                $data = compact('params');
                $tag = $params['tag'];
                $attributes = empty($params['attributes']) ? '' : ' ' . \Html::attributes($params['attributes']);
                echo empty($tag) ? '' : "<{$tag}{$attributes}>";
                foreach ($tree as $node) {
                    $data['node'] = $node;
                    echo view($params['view'], $data);
                }
                echo empty($tag) ? '' : "</{$tag}>";
            }
        }
    }
}