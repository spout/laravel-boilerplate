<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\MenusDataTable;
use App\Libraries\TreeCollection;
use App\Models\Content;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Post;
use App\Models\Traits\AdjacencyListTrait;
use Illuminate\Http\Request;

class MenusController extends AdminController
{
    protected static $model = Menu::class;
    protected static $dataTableClass = MenusDataTable::class;

    public function update(Request $request, $id)
    {
        $response = parent::update($request, $id);
        $menu = Menu::find($id);
        foreach ($request->input('menuItems', []) as $item) {
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

    public function treeData($id)
    {
        $menu = Menu::find($id);

        $data = [];
        foreach ($menu->menuItems as $item) {
            $data[] = [
                'id' => $item->id,
                'parent' => $item->parent_id ?? '#',
                'text' => $item->title,
                'data' => $item->toArray(),
            ];
        }
        return response()->json($data);
    }

    public function treeSave(Request $request)
    {
        $id = $request->input('id');

        /**
         * jstree creates id like j1_1
         */
        if (is_numeric($id)) {
            $menuItem = MenuItem::find($id);
        } else {
            $menuItem = new MenuItem;
        }

        $menuItem->fill($request->except(['id', 'siblings']));
        $saved = $menuItem->save();

        if ($saved) {
            foreach ($request->input('siblings', []) as $sort => $id) {
                MenuItem::where('id', $id)->update(compact('sort'));
            }
        }

        return response()->json(['status' => $saved ? 'success' : 'error', 'data' => $menuItem->toArray()], $saved ? 200 : 400);
    }

    public function treeDestroy(Request $request)
    {
        $count = MenuItem::destroy($request->input('id'));

        return response()->json(['status' => !empty($count) ? 'success' : 'error'], !empty($count) ? 200 : 400);
    }
}