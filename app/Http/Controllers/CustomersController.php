<?php
namespace App\Http\Controllers;

use App\Http\Requests\AfterSalesServiceFormRequest;
use App\Models\AfterSalesService;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
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

    public function afterSalesService()
    {
        return view('customers.after-sales-service');
    }

    public function afterSalesServicePost(AfterSalesServiceFormRequest $request)
    {
        AfterSalesService::create($request->all());
        flash(_i("Your after-save service was created successfully!"), 'success');
        return redirect()->route('customers.after-sales-service');
    }

}