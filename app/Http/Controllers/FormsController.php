<?php

namespace App\Http\Controllers;

use App\Mail\FormSend;
use App\Models\Form;
use App\Models\FormData;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormsController extends Controller
{
    public function store(Request $request)
    {
        $form = Form::findOrFail($request->input('form_id'));
        $labels = json_decode($request->input('labels'), true);

        $rules = [];
        $messages = [];
        $data = [];
        $email = null;
        $newsletter = false;

        foreach ($form->fields as $key => $field) {
            if (!empty($field->required)) {
                $rules[$field->name] = 'required';
                $messages["{$field->name}.required"] = _i("The field %s is required.", strtolower($field->label));
            }

            $value = $request->input($field->name);

            $dataKey = $labels[$field->name];
            $dataKeySuffix = 1;
            while (array_key_exists($dataKey, $data)) {
                $dataKey = "{$dataKey} ({$dataKeySuffix})";
                $dataKeySuffix++;
            }
            $data[$dataKey] = $value;

            switch ($field->type) {
                case 'email':
                    $email = $value;
                    break;

                case 'newsletter':
                    $newsletter = $value;
                    break;
            }
        }

        $request->validate($rules, $messages);

        $formData = [
            'form_id' => $request->input('form_id'),
            'data' => $data,
        ];

        FormData::create($formData);
        Mail::send(new FormSend($form, $data));

        if (!empty($email) && !empty($newsletter)) {
            Newsletter::create(compact('email'));
        }

        flash(_i("The message was sent successfully!"), 'success');
        return redirect()->back();
    }
}
