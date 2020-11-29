<?php

namespace App\Providers;
use View;
use DB;

use Illuminate\Support\ServiceProvider;

class CategoriasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){

            $categorias = DB::table('categoria_recetas')->get();

            $view->with('categorias', $categorias);
        });
    }
}
