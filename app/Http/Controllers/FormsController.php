<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormData;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function store(Request $request)
    {
        $form = Form::findOrFail($request->input('form_id'));

        $rules = [];
        $messages = [];

        foreach ($form->fields as $key => $field) {
            if (!empty($field->required)) {
                $rules[$field->name] = 'required';
                $messages["{$field->name}.required"] = _i("The field %s is required.", strtolower($field->label));
            }
        }

        $request->validate($rules, $messages);

        $data = [
            'form_id' => $request->input('form_id'),
            'data' => $request->except('form_id', '_token'),
        ];

        FormData::create($data);
    }
}
