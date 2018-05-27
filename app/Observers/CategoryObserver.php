<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Criteria;

class CategoryObserver
{
    public function saved(Category $category)
    {
        // Delete all associated items
        //Criteria::where('category_id', $category->id)->delete();

        // Create all criterias
        foreach (request()->input('criterias', []) as $k => $criteria) {
            $names = [];
            $attributes = [
                'category_id' => $category->id,
                'sort' => $criteria['sort'],
            ];

            foreach (Criteria::$translatableColumns as $column) {
                foreach (config('app.locales') as $lang => $locale) {
                    if ($column === 'name' && !empty($criteria["{$column}_{$lang}"])) {
                        $names[] = $criteria["{$column}_{$lang}"];
                    }
                    $attributes["{$column}_{$lang}"] = $criteria["{$column}_{$lang}"] ?? null;
                }
            }

            if (count(config('app.locales')) === count($names)) {
                Criteria::create($attributes);
            }
        }
    }
}