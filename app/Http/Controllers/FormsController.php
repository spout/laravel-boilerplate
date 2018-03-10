<?php

namespace App\Http\Controllers;

use App\Mail\FormSend;
use App\Models\Form;
use App\Models\FormData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $data = $request->except('form_id', '_token');
        $formData = [
            'form_id' => $request->input('form_id'),
            'data' => $data,
        ];

        FormData::create($formData);
        Mail::send(new FormSend($form, $data));

        flash(_i("The message was send successfully!"), 'success');
        return redirect()->back();
    }
}
