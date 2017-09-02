<?php
namespace App\Http\ViewComposers;

use App\Libraries\GoogleCalendar;
use Illuminate\View\View;

class EventTemplateComposer
{
    public function compose(View $view)
    {
        $googleCalendar = new GoogleCalendar();
        $colorList = ['' => '-'];
        foreach ($googleCalendar->getService()->colors->get()->getEvent() as $key => $color) {
            $colorList[$key] = $color->getBackground();
        }
        $view->with(compact('colorList'));
    }
}