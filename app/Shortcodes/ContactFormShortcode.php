<?php
namespace App\Shortcodes;

class ContactFormShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return view('contacts.includes.form');
    }
}