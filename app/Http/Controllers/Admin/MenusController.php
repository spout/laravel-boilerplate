<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\MenusDataTable;
use App\Models\Content;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Post;
use Illuminate\Http\Request;

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
                $associations[$label]["$model.{$row->pk}"] = $row->__toString();
            }
        }

        $view->associations = $associations;
        return $view;
    }

    public function update(Request $request, $id)
    {
        foreach ($request->input('menuItems') as $item) {
            $menuItem = MenuItem::find($item['id']);
            if (strpos($item['association'], '.') !== false) {
                list($item['model'], $item['foreign_key']) = explode('.', $item['association']);
            }
            unset($item['association']);

            $menuItem->update($item);
        }

        return parent::update($request, $id);
    }
}