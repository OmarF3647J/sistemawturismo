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



    }
}
