<?php
namespace App\Http\Controllers;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function files()
    {
        $path = '/files/customers/';
        $file = request()->query('file');

        if (!empty($file)) {
            return response()->download(public_path($path . request()->query('file')));
        } else {
            $files = glob(public_path($path) . '*');
            return view('customers.files', compact('files'));
        }
    }

}