<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\CentroTurist;




class SitioController extends Controller
{
    //public function inicio()
    //{
        // Obtener nombre por id
         //$centroPorID = CentroTurist::find(1); 


        // Enviamos las variables a la vista inicio.blade.php
        //return view('inicio', compact('centroPorID'));
    //}

public function inicio(){
    // Cargar los centros que necesites por ID
    $centros = CentroTurist::whereIn('idcentur', [1, 2, 3, 6, 7, 8, 9, 10, 11, 12])->get()->keyBy('idcentur');

    // `keyBy` convierte la colección en algo como:
    // [1 => Centro(id=1), 3 => Centro(id=3), 5 => Centro(id=5)]

    return view('inicio', compact('centros'));
}

}
