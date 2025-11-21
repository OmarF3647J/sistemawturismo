<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;  
use Illuminate\Contracts\View\View;
use App\Models\CentroTurist; 



class NombreCentro extends Component
{
    public $nombreCentro;

    /**
     * El componente acepta la ID del centro turístico como parámetro.
     */
    public function __construct($id)
    {
        // 1. Buscamos el centro en la base de datos usando la ID
        $centro = CentroTurist::find($id);

        // 2. Almacenamos el nombre (o un valor por defecto)
        $this->nombreCentro = $centro ? $centro->nomcentur : 'Centro no encontrado';
    }

    /**
     * Obtiene la vista/contenido que representa el componente.
     */
    public function render()
    {
        return view('components.nombre-centro');
    }
}
