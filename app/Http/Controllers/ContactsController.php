<?php
namespace App\Http\Controllers;

use App\Mail\ContactSend;
use App\Models\Contact;
use App\Http\Requests\ContactSendFormRequest;
use Illuminate\Support\Facades\Mail;

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

        Mail::send(new ContactSend($contact));

        flash(_i("Message was sent successfully."), 'success');
        return redirect()->back();
    }
}