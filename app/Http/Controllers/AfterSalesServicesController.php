<?php

namespace App\Http\Controllers;

use App\Http\Requests\AfterSalesServiceFormRequest;
use App\Models\AfterSalesService;

class AfterSalesServicesController extends Controller
{
    public function create()
    {
        return view('after-sales-services.create');
    }

    public function store(AfterSalesServiceFormRequest $request)
    {
        $photo = $request->file('photo')->store('public/files/after-sales-services');
        $all = array_merge($request->except('photo'), compact('photo'));
        AfterSalesService::create($all);
        flash(_i("Your after-sales service was created successfully!"), 'success');
        return redirect()->route('after-sales-services.create');
    }
}