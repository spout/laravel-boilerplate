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

        $view->object->menuItems->push(new MenuItem());
        $view->associations = $associations;
        return $view;
    }

    public function update(Request $request, $id)
    {
        $response = parent::update($request, $id);
        $menu = Menu::find($id);
        foreach ($request->input('menuItems') as $item) {
            if (empty($item['id'])) {
                $menu->menuItems()->create($item);
            } else {
                $menuItem = MenuItem::find($item['id']);
                $menuItem->fill($item);
                $menu->menuItems()->save($menuItem);
            }
        }

        return $response;
    }
}