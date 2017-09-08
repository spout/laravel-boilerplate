<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\PropertiesDataTable;
use App\Http\Requests\PropertiesFormRequest;
use App\Libraries\GoogleCalendar;
use App\Mail\PropertiesBookingSend;
use App\Models\Booking;
use App\Models\Email;
use App\Models\EmailType;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PropertiesController extends AdminController
{
    protected static $model = Property::class;
    protected static $requestClass = PropertiesFormRequest::class;
    protected static $dataTableClass = PropertiesDataTable::class;

    public function sendEmail(Request $request, $id, $type)
    {
        $emailType = EmailType::find($type);
        $booking = Booking::findOrFail($id);

        if ($request->isMethod('post')) {
            dd($request->all());

            //$email = Email::create($request->all());
            //Mail::send(new PropertiesSendEmails($email));

            flash(_i("Email was sent successfully."), 'success');
            return redirect()->back();
        }

        $to = templates_tags_replace($booking, $emailType->emailTemplate['to']);
        $subject = templates_tags_replace($booking, $emailType->emailTemplate['subject']);
        $message = templates_tags_replace($booking, $emailType->emailTemplate['template']);

        return view('admin.properties.send-email', compact('emailType', 'to', 'subject', 'message'));
    }

}