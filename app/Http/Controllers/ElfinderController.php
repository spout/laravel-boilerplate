<?php

namespace App\Http\Controllers;

class ElfinderController extends \Barryvdh\Elfinder\ElfinderController
{
    public function showPopup($input_id)
    {
        return $this->app['view']
            ->make('elfinder.standalonepopup-custom')
            ->with($this->getViewVars())
            ->with(compact('input_id'));
    }

    public function showIndex()
    {
        return $this->app['view']
            ->make('elfinder.elfinder')
            ->with($this->getViewVars());
    }
}