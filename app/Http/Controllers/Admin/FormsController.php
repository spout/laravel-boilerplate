<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FormsDataTable;
use App\Http\Requests\FormFormRequest;
use App\Models\Form;
use Illuminate\Http\Request;

class FormsController extends AdminController
{
    public static $model = Form::class;
    public static $requestClass = FormFormRequest::class;
    public static $dataTableClass = FormsDataTable::class;

    public function preview(Request $request)
    {
        $fields = $request->input('fields');
        return view('admin.forms.preview', compact('fields'));
    }
}