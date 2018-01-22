<?php

namespace App\Http\Controllers;

class ManifestController extends Controller
{
    public function index()
    {
        return response()->json(setting('manifest'), 200, [], JSON_PRETTY_PRINT);
    }
}