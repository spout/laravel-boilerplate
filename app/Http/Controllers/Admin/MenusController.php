<?php
namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Content;
use App\Models\Post;

class MenusController extends AdminController
{
    protected static $model = Menu::class;
    protected static $resourcePrefix = 'admin.menus';

    public function edit($id)
    {
        $view = parent::edit($id);

        $models = [
            Content::class => __("Content"),
            Post::class => __("Post"),
        ];

        $associations = ['' => '-'];
        foreach ($models as $model => $label) {
            $rows = $model::all();
            foreach ($rows as $row) {
                $associations[$label][sprintf('%s:%s', $model, $row->pk)] = $row->__toString();
            }
        }

        $view->associations = $associations;
        return $view;
    }
}