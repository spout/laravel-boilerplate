<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TemplatesDataTable;
use App\Http\Requests\TemplateFormRequest;
use App\Models\Template;

class TemplatesController extends AdminController
{
    public static $model = Template::class;
    public static $requestClass = TemplateFormRequest::class;
    public static $dataTableClass = TemplatesDataTable::class;
    public static $resourcePrefix = 'admin.templates';

    public function duplicate($pk)
    {
        $template = Template::find($pk);
        $replicate = $template->replicate(['slug']);
        $replicate->slug = "$pk-duplicate";
        $replicate->save();

        flash(_i("Template successfully duplicated!"), 'success');
        return redirect()->route("{$this->viewPath()}.edit", [$replicate->pk]);
    }
}