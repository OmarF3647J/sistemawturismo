<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\centrosturist;



class SitioController extends Controller
{

    

public function inicio(){
    // Cargar los centros que necesites por ID
    $centros = centrosturist::whereIn('idcentur', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15])->get()->keyBy('idcentur');
    
    // `keyBy` convierte la colección en algo como:
    // [1 => Centro(id=1), 3 => Centro(id=3), 5 => Centro(id=5)]
    return view('inicio', compact('centros'));
}

public function apompal()
{
    // colección completa (la que tu vista usa con $centros[0] en varias partes)
    $centros = centrosturist::all();

    // centro específico (id = 1) con sus actividades
    $centro = centrosturist::with('actividadturist')->find(1);

    return view('apompal', compact('centros', 'centro'));
}

}
