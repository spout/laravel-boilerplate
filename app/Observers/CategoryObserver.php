<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Tag;

class CategoryObserver
{
    public function saved(Category $category)
    {
        foreach (request()->input('tags', []) as $k => $tag) {
            $names = [];
            $values = [
                'category_id' => $category->id,
                'sort' => $tag['sort']
            ];

            foreach (config('app.locales') as $lang => $locale) {
                foreach (Tag::$translatableColumns as $column) {
                    if ($column === 'name' && !empty($tag["{$column}_{$lang}"])) {
                        $names[] = $tag["{$column}_{$lang}"];
                    }
                    $values["{$column}_{$lang}"] = $tag["{$column}_{$lang}"];
                }
            }

            if (count(config('app.locales')) === count($names)) {
                Tag::updateOrCreate(['id' => $tag['id']], $values);
            }
        }
    }
}