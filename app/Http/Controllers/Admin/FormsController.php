<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FormsDataTable;
use App\Http\Requests\FormFormRequest;
use App\Models\Form;
use Illuminate\Http\Request;

class FormsController extends AdminController
{
    protected static $model = Form::class;
    protected static $requestClass = FormFormRequest::class;
    protected static $dataTableClass = FormsDataTable::class;

    public function preview(Request $request)
    {
        $fields = $request->input('fields');
        return view('admin.forms.preview', compact('fields'));
    }
}