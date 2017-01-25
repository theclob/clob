<?php

namespace Clob\Providers;

use AdamWathan\Form\FormBuilder;
use AdamWathan\BootForms\BootFormsServiceProvider as OriginalProvider;

class BootFormsServiceProvider extends OriginalProvider
{
    /**
     * Override the registerFormBuilder method to use token()
     * instead of getToken() on new Session interface in Laravel 5.4
     *
     * @return FormBuilder
     */
    protected function registerFormBuilder()
    {
        $this->app->singleton('adamwathan.form', function ($app) {
            $formBuilder = new FormBuilder;
            $formBuilder->setErrorStore($app['adamwathan.form.errorstore']);
            $formBuilder->setOldInputProvider($app['adamwathan.form.oldinput']);
            $formBuilder->setToken($app['session.store']->token());
            return $formBuilder;
        });
    }
}
