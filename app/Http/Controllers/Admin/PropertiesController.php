<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\PropertiesDataTable;
use App\Http\Requests\PropertyFormRequest;
use App\Models\Booking;
use App\Models\EmailType;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesController extends AdminController
{
    protected static $model = Property::class;
    protected static $requestClass = PropertyFormRequest::class;
    protected static $dataTableClass = PropertiesDataTable::class;

    public function sendEmail(Request $request, $id, $type)
    {
        $emailType = EmailType::find($type);
        $booking = Booking::findOrFail($id);

        if ($request->isMethod('post')) {
            dd($request->all());

            //$email = Email::create($request->all());
            //Mail::send(new PropertiesNotificationSend($email));

            flash(_i("Email was sent successfully."), 'success');
            return redirect()->back();
        }

        $to = templates_tags_replace($booking, $emailType->emailTemplate['to']);
        $subject = templates_tags_replace($booking, $emailType->emailTemplate['subject']);
        $message = templates_tags_replace($booking, $emailType->emailTemplate['template']);

        return view('admin.properties.send-email', compact('emailType', 'to', 'subject', 'message'));
    }

    public function bookingsDatatables()
    {
        $emailTypes = EmailType::where('type', '!=', 'not-available')->get();

        return datatables(Booking::query())
            ->addColumn('sent', function (Booking $booking) {
                return view('admin.properties.datatables.booking-sent', compact('booking'));
            })
            ->addColumn('send', function (Booking $booking) use ($emailTypes) {
                return view('admin.properties.datatables.booking-send', compact('booking', 'emailTypes'));
            })
            ->rawColumns(['sent', 'send'])
            ->toJson();
    }

}