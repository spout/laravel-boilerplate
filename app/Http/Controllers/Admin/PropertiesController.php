<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\PropertiesDataTable;
use App\Libraries\GoogleCalendar;
use App\Mail\PropertiesSendEmails;
use App\Models\Booking;
use App\Models\Email;
use App\Models\EmailTemplate;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PropertiesController extends AdminController
{
    protected static $model = Property::class;
    //protected static $requestClass = ContentFormRequest::class;
    protected static $dataTableClass = PropertiesDataTable::class;

    public function sendEmail(Request $request, $id, $type)
    {
        $emailTemplate = EmailTemplate::find($type);
        $booking = Booking::findOrFail($id);

        if ($request->isMethod('post')) {
            dd($request->all());

            //$email = Email::create($request->all());
            //$email->save();
            //
            //Mail::send(new PropertiesSendEmails($email));

            flash(_i("Email was sent successfully."), 'success');
            return redirect()->back();
        }

        $search = [];
        $replace = [];
        foreach (config('templates-tags') as $tag => $label) {
            list($entity, $attribute) = explode('.', $tag);
            $search[] = "[$tag]";
            switch ($entity) {
                case 'booking':
                    $replace[] = $booking->{$attribute};
                    break;

                case 'property':
                    $replace[] = $booking->property->{$attribute};
                    break;
            }
        }

        $to = str_replace($search, $replace, $emailTemplate->to);
        $subject = str_replace($search, $replace, $emailTemplate->subject);
        $message = str_replace($search, $replace, $emailTemplate->template);

        return view('admin.properties.send-email', compact('emailTemplate', 'to', 'subject', 'message'));
    }

    public function getEmailData(Request $request, $id)
    {
        $data = [
            'subject' => null,
            'message' => null,
        ];

        $emailTemplateId = $request->input('emailTemplateId');
        if (!empty($emailTemplateId)) {
            $booking = Booking::findOrFail($id);
            $emailTemplate = EmailTemplate::find($emailTemplateId);

            $subject = $emailTemplate->subject;
            $message = $emailTemplate->template;

            $search = [];
            $replace = [];
            foreach (config('templates-tags') as $tag => $label) {
                list($entity, $attribute) = explode('.', $tag);

                $search[] = "[$tag]";
                switch ($entity) {
                    case 'booking':
                        $replace[] = $booking->{$attribute};
                        break;

                    case 'property':
                        $replace[] = $booking->property->{$attribute};
                        break;
                }
            }

            $subject = str_replace($search, $replace, $subject);
            $message = str_replace($search, $replace, $message);

            $data = compact('subject', 'message');
        }

        return response()->json($data);
    }
}