<?php

namespace App\Providers;

use App\Html\FormBuilder;
use Collective\Html\HtmlServiceProvider as CollectiveHtmlServiceProvider;

class HtmlServiceProvider extends CollectiveHtmlServiceProvider
{
    /**
     * Register the form builder instance.
     *
     * @return void
     */
    protected function registerFormBuilder()
    {
        $this->app->bind('form', function($app)
        {
            $form = new FormBuilder($app['html'], $app['url'], $app['view'], $app['session.store']->token());

            return $form->setSessionStore($app['session.store']);
        });
    }
}