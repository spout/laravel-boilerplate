<?php
namespace App\Providers\Directives;

class TreeDirective
{
    public static function display($expression)
    {
        $defaults = [
            'tree' => null,
            'view' => 'tree.display',
            'tag' => 'ul',
            'extraData' => [],
        ];

        $data = [];
        foreach ($expression as $var => $value) {
            if (in_array($var, array_keys($defaults))) {
                $data[$var] = $expression[$var] ?? $defaults[$var];
            } else {
                $data[$var] = $expression[$var];
            }
        }

        if (!empty($expression['tree'])) {
            $tree = $expression['tree'];

            if ($tree->count()) {
                echo "<{$data['tag']}>";
                foreach ($tree as $node) {
                    $data['node'] = $node;
                    echo view($data['view'], $data);
                }
                echo "</{$data['tag']}>";
            }
        }
    }
}