<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class TemplateFileListComposer
{
    public function compose(View $view)
    {
        $path = 'templates/';
        $files = glob(resource_path("views/$path") . '*.blade.php');
        $templateFileList = ['' => '-'];
        foreach ($files as $file) {
            $name = str_replace(['.blade.php', '/'], ['', '.'], basename($file));
            $templateFileList[$name] = $name;
        }
        $view->with(compact('templateFileList'));
    }
}