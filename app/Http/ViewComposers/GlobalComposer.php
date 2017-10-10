<?php
namespace App\Http\ViewComposers;

use App\Models\MenuItem;
use Illuminate\View\View;

class GlobalComposer
{
    public function compose(View $view)
    {
        $menuPrincipal = MenuItem::whereHas('menu', function ($query) {
                $query->where('slug', 'principal');
            })
            ->get()
            ->buildTree();
        $view->with(compact('menuPrincipal'));
    }
}