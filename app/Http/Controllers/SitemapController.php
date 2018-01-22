<?php

namespace App\Http\Controllers;

class SitemapController extends Controller
{
    public function index($ext)
    {
        $urls = [];
        foreach (config('sitemap.models', []) as $model) {
            $rows = $model::all();
            foreach ($rows as $row) {
                $urls[] = $row->absoluteUrl;
            }
        }

        return response()
            ->view("sitemap.{$ext}", compact('urls'))
            ->header('Content-Type', config("sitemap.types.{$ext}"));
    }
}