<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function index(Request $request)
    {
        $categoryList = Category::all()->pluck('title_plural', 'id')->prepend(_i("All categories"), '');
        return view('reserve.index', compact('categoryList'));
    }
}