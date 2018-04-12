<?php

namespace App\Shortcodes;

use App\Models\Accordion;

class AccordionShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $accordion = Accordion::find($shortcode->id);
        return view('shortcodes.accordion', compact('shortcode', 'accordion'));
    }
}