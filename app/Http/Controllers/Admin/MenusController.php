<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\MenusDataTable;
use App\Models\Content;
use App\Models\Menu;
use App\Models\Post;

class MenusController extends AdminController
{
    protected static $model = Menu::class;
    protected static $dataTableClass = MenusDataTable::class;

    public function edit($id)
    {
        $view = parent::edit($id);

        $models = [
            Content::class => _i("Content"),
            Post::class => _i("Post"),
        ];

        $associations = ['' => '-'];
        foreach ($models as $model => $label) {
            $rows = $model::all();
            foreach ($rows as $row) {
                $associations[$label]["$model:{$row->pk}"] = $row->__toString();
            }
        }

        $view->associations = $associations;
        return $view;
    }
}