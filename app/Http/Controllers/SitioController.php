<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\centrosturist;
use App\Models\guiasturist;



class SitioController extends Controller
{
    public function inicio()
    {
        // Obtener nombre por id
         $centroPorID = Centrosturist::find(1); 

        // Obtener el primer registro de cada tabla
        $primerCentro = Centrosturist::first();
        $primerGuia = Guiasturist::first();

        // Enviamos las variables a la vista inicio.blade.php
        return view('inicio', compact('primerCentro', 'primerGuia', 'centroPorID'));

    }


    public function centro($nombre)
    {
        $centro = Centrosturist::where('nomcentur', $nombre)->firstOrFail();
        return view('centro', compact('centro'));
    }

    public function guia($nombre)
    {
        $guia = Guiasturist::where('nomguia', $nombre)->firstOrFail();
        return view('guia', compact('guia'));
    }


}
