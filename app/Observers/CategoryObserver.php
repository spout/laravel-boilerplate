<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Taggable;

class CategoryObserver
{
    public function saved(Category $category)
    {
        foreach (request()->input('tags', []) as $k => $tag) {
            $names = [];
            $values = [];
            foreach (config('app.locales') as $lang => $locale) {
                foreach (Tag::$translatableColumns as $column) {
                    if ($column === 'name' && !empty($tag["{$column}_{$lang}"])) {
                        $names[] = $tag["{$column}_{$lang}"];
                    } else {
                        /**
                         * Deleting via DB::table because no primaryKey on Taggable
                         */
                        \DB::table(Taggable::getTableName())->where([
                            'tag_id' => $tag['id'],
                            'taggable_id' => $category->id,
                            'taggable_type' => Category::class
                        ])->delete();
                    }
                    $values["{$column}_{$lang}"] = $tag["{$column}_{$lang}"];
                }
            }

            if (count(config('app.locales')) === count($names)) {
                $tag = Tag::updateOrCreate(['name_en' => $tag['name_en']], $values);

                Taggable::firstOrCreate([
                    'tag_id' => $tag->id,
                    'taggable_id' => $category->id,
                    'taggable_type' => Category::class,
                ]);
            }
        }
    }
}