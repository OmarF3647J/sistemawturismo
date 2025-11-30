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

public function mostrarCentro($id = null)
{
    // Detectamos qué ruta se está usando
    if (request()->routeIs('apompal')) {
        $id = 1;
        $vista = 'apompal';
    } elseif (request()->routeIs('arrecifes')) {
        $id = 2;
        $vista = 'arrecifes';
    } elseif (request()->routeIs('benitojuarez')) {
        $id = 3;
        $vista = 'benitojuarez';
    } elseif (request()->routeIs('cabanasencantadas')) {
        $id = 4;
        $vista = 'cabanasencantadas';
    } elseif (request()->routeIs('cascadasencantadas')) {
        $id = 5;
        $vista = 'cascadasencantadas';
    } elseif (request()->routeIs('ceytaks')) {
        $id = 6;
        $vista = 'ceytaks';
    } elseif (request()->routeIs('elmirador')) {
        $id = 7;
        $vista = 'elmirador';
    } elseif (request()->routeIs('jomxuk')) {
        $id = 8;
        $vista = 'jomxuk';
    } elseif (request()->routeIs('kantasejkan')) {
        $id = 9;
        $vista = 'kantasejkan';
    } elseif (request()->routeIs('lagunadelostion')) {
        $id = 10;
        $vista = 'lagunadelostion';
    } elseif (request()->routeIs('lasmargaritas')) {
        $id = 11;
        $vista = 'lasmargaritas';
    } elseif (request()->routeIs('manglaressontecomapan')) {
        $id = 12;
        $vista = 'manglaressontecomapan';
    } elseif (request()->routeIs('ranchodonaelia')) {
        $id = 13;
        $vista = 'ranchodonaelia';
    } elseif (request()->routeIs('rocapartida')) {
        $id = 14;
        $vista = 'rocapartida';
    } elseif (request()->routeIs('selvaelmarinero')) {
        $id = 15;
        $vista = 'selvaelmarinero';
    } 

    // colección completa
    $centros = centrosturist::all();

    // centro específico con actividades
    $centro = centrosturist::with('actividadturist')->findOrFail($id);

    return view($vista, compact('centros', 'centro'));
}


}
