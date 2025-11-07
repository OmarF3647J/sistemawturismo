<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\CentroTurist;
use App\Models\guiasturist;



class SitioController extends Controller
{
    public function inicio()
    {
        // Obtener nombre por id
         $centroPorID = CentroTurist::find(1); 

        // Obtener el primer registro de cada tabla
        $primerCentro = CentroTurist::first();
        //$primerGuia = Guiasturist::first();

        // Enviamos las variables a la vista inicio.blade.php
        return view('inicio', compact('primerCentro', 'centroPorID'));

    }


    public function centro($nombre)
    {
        $centro = CentroTurist::where('nomcentur', $nombre)->firstOrFail();
        return view('centro', compact('centro'));
    }



}
