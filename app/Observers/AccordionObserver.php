<?php

namespace App\Observers;

use App\Models\Accordion;
use App\Models\AccordionItem;

class AccordionObserver
{
    public function saving(Accordion $accordion)
    {
        unset($accordion->items);
    }

    public function saved(Accordion $accordion)
    {
        // Delete all associated items
        AccordionItem::where('accordion_id', $accordion->id)->delete();

        // Create all items
        foreach (request()->input('items', []) as $k => $item) {
            $titles = [];
            $attributes = [
                'accordion_id' => $accordion->id,
                'sort' => $item['sort'],
            ];

            foreach (AccordionItem::$translatableColumns as $column) {
                foreach (config('app.locales') as $lang => $locale) {
                    if ($column === 'title' && !empty($item["{$column}_{$lang}"])) {
                        $titles[] = $item["{$column}_{$lang}"];
                    }
                    $attributes["{$column}_{$lang}"] = $item["{$column}_{$lang}"] ?? null;
                }
            }

            if (count(config('app.locales')) === count($titles)) {
                AccordionItem::create($attributes);
            }
        }
    }
}