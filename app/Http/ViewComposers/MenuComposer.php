<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Content;
use App\Models\Post;
use App\Models\Traits\AdjacencyListTrait;

class MenuComposer
{
    public function compose(View $view)
    {
        $models = [
            Content::class => _i("Content"),
            Post::class => _i("Post"),
        ];

        $associationList = ['' => '-'];
        foreach ($models as $model => $label) {
            if (in_array(AdjacencyListTrait::class, class_uses($model))) {
                $tree = $model::all()->buildTree();
                $associationList[$label] = $model::getTreeList($tree, function ($node) use ($model) {
                    return "{$model}.{$node->pk}";
                });
            } else {
                $rows = $model::all();
                foreach ($rows as $row) {
                    $associationList[$label]["{$model}.{$row->pk}"] = $row->__toString();
                }
            }
        }

        $view->with(compact('associationList'));
    }
}