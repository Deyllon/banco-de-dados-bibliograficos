<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Repositories\AutorRepository;
use App\Repositories\LivroRepository;
use App\Models\Autor;
use App\Models\Livro;
use App\Validation\NumeroPaginasValidator;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AutorRepository::class, function ($app){
            return new AutorRepository($app->make(Autor::class));
        });

        $this->app->bind(LivroRepository::class,function($app){
            return new LivroRepository($app->make(Livro::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('Validar_numero_paginas', function($attribute, $value, $parameters, $validator){
            return $value > 0 && $value >= 30;
        });

    }
}
