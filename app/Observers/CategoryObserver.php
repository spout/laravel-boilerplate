<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Criteria;

class CategoryObserver
{
    public function saved(Category $category)
    {
        foreach (request()->input('criterias', []) as $k => $criteria) {
            $names = [];
            $values = [
                'category_id' => $category->id,
                'sort' => $criteria['sort']
            ];

            foreach (config('app.locales') as $lang => $locale) {
                foreach (Criteria::$translatableColumns as $column) {
                    if ($column === 'name' && !empty($criteria["{$column}_{$lang}"])) {
                        $names[] = $criteria["{$column}_{$lang}"];
                    }
                    $values["{$column}_{$lang}"] = $criteria["{$column}_{$lang}"];
                }
            }

            if (count(config('app.locales')) === count($names)) {
                Criteria::updateOrCreate(['id' => $criteria['id']], $values);
            }
        }
    }
}