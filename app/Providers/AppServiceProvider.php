<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Agregamos la clase View
use App\Models\CentroTurist; // Agregamos tu modelo

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);

        // --- 2. View Composer para la variable $centros ---
        // Esto asegura que $centros esté disponible en el parcial 'partials.header'
        View::composer('partials.header', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            // NOTA: Si tu modelo se llama diferente, ajusta "CentroTuristico"
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });
        // --------------------------------------------------


        View::composer('partials.title-apompal', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });


        View::composer('partials.title-arrecifes', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });
        
        View::composer('partials.title-benitojuarez', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-cabanasencantadas', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-cascadasencantadas', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-ceytaks', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-elmirador', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-jomkux', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-kantasejkan', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-lagunaostion', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-lasmargaritas', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-manglaressontecomapan', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-ranchodonaelia', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-rocapartida', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            // NOTA: Si tu modelo se llama diferente, ajusta "CentroTuristico"
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });

        View::composer('partials.title-selvaelmarinero', function ($view) {
            // Utilizamos el modelo para obtener todos los centros
            // NOTA: Si tu modelo se llama diferente, ajusta "CentroTuristico"
            $centros = CentroTurist::all(); 
            $view->with('centros', $centros);
        });






    }

    
}
