<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class SnippetComposer
{
    public function compose(View $view)
    {
        $componentsPath = 'snippets/components/';
        $components = glob(resource_path("views/$componentsPath") . '*.blade.php');
        $componentList = ['' => '-'];
        foreach ($components as $component) {
            $name = str_replace(['.blade.php', '/'], ['', '.'], $componentsPath . basename($component));
            $componentList[$name] = $name;
        }
        $view->with('componentList', $componentList);
    }
}