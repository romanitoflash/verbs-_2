<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('convertirAMayusculas', function ($attribute, $value, $parameters, $validator) {
            // Convertir el valor del campo a mayúsculas
           // $validator->setData([$attribute => strtoupper($value)]);
           return strtoupper($value) === $value;
            // Retorna true para indicar que la validación pasó
            //return true;
        });
    }
}
