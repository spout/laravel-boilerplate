<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\PropertiesDataTable;
use App\Http\Requests\PropertyFormRequest;
use App\Mail\PropertiesNotificationSend;
use App\Models\Booking;
use App\Models\EmailType;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PropertiesController extends AdminController
{
    protected static $model = Property::class;
    protected static $requestClass = PropertyFormRequest::class;
    protected static $dataTableClass = PropertiesDataTable::class;

    public function sendEmail(Request $request, $id, $type)
    {
        $emailType = EmailType::find($type);
        $booking = Booking::find($id);

        if ($request->isMethod('post')) {
            $email = Email::create([
                'property_id' => $booking->property['id'],
                'booking_id' => $booking->id,
                'email_type' => $type,
                'to' => $request->input('to'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ]);

            Mail::send(new PropertiesNotificationSend($email));

            flash(_i("Email was sent successfully."), 'success');
            return redirect()->back();
        }

        $to = templates_tags_replace($booking, $emailType->emailTemplate['to']);
        $subject = templates_tags_replace($booking, $emailType->emailTemplate['subject']);
        $message = templates_tags_replace($booking, $emailType->emailTemplate['template']);

        return view('admin.properties.send-email', compact('emailType', 'to', 'subject', 'message'));
    }

    public function bookingsDatatables($id, $scope = 'future')
    {
        $emailTypes = EmailType::where('type', '!=', 'not-available')->get();

        return datatables(Booking::where('property_id', $id)->{$scope}())
            ->editColumn('arrival_date', function (Booking $booking) {
                return $booking->arrival_date->format('d/m/Y');
            })
            ->editColumn('departure_date', function (Booking $booking) {
                return $booking->departure_date->format('d/m/Y');
            })
            ->editColumn('phone', function (Booking $booking) {
                return view('admin.properties.datatables.booking-phone', compact('booking'));
            })
            ->editColumn('email', function (Booking $booking) {
                return view('admin.properties.datatables.booking-email', compact('booking'));
            })
            ->addColumn('sent', function (Booking $booking) {
                return view('admin.properties.datatables.booking-sent', compact('booking'));
            })
            ->addColumn('send', function (Booking $booking) use ($emailTypes) {
                return view('admin.properties.datatables.booking-send', compact('booking', 'emailTypes'));
            })
            ->rawColumns(['phone', 'email', 'sent', 'send'])
            ->toJson();
    }

}