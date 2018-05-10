<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\ModuleTemplate;

class CategoryObserver
{
    public function saved(Category $category)
    {
        // Delete all associated category modules
        ModuleTemplate::where('category_id', $category->id)->delete();

        // Create all category modules
        foreach (request()->input('modules', []) as $k => $module) {
            if (!empty($module['module_slug'])) {
                ModuleTemplate::create([
                    'category_id' => $category->id,
                    'module_slug' => $module['module_slug'],
                    'slug' => $module['slug'],
                    'sort' => $module['sort'],
                ]);
            }
        }
    }
}