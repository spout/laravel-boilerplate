<?php

namespace App\Observers;

use App\Models\Placeholder;
use App\Models\Template;

class TemplateObserver
{
    public function saved(Template $template)
    {
        foreach (request()->input('placeholders', []) as $k => $placeholder) {
            if (!empty($placeholder['module_slug'])) {
                $values = [
                    'template_slug' => $template->slug,
                    'module_slug' => $placeholder['module_slug'],
                    'placeholder' => $placeholder['placeholder'],
                ];

                foreach (config('app.locales') as $lang => $locale) {
                    foreach (Placeholder::$translatableColumns as $column) {
                        $values["{$column}_{$lang}"] = $placeholder["{$column}_{$lang}"];
                    }
                }

                Placeholder::updateOrCreate([
                    'id' => $placeholder['id']
                ], $values);
            }
        }
    }
}