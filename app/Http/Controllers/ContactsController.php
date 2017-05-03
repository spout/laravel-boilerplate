<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactSendFormRequest;

class ContactsController extends Controller
{
    protected static $model = Contact::class;

    public function form()
    {
        return view('contacts.form');
    }

    public function send(ContactSendFormRequest $request)
    {
        $contact = Contact::create($request->all());
        $contact->save();

        flash(_i("Message was sent successfully."), 'success');
        return redirect()->back();
    }
}