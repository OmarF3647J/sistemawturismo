<?php

namespace App\Http\Controllers;

use App\Models\centrosturist;
use App\Models\producto;
use App\Models\actividadturist;
use App\Models\guiasturist;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CentrosturistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centrosturist = centrosturist::with('producto','actividadturist','guiasturist.actividadturist')->paginate(10);
        // los nombre de las relaciones deben coincidir con los definidos en el modelo
        // producto y actividadturist son las relaciones definidas en el modelo centrosturist
        $productos = producto::all();
        $actividadturist = actividadturist::all();
        $guiasturist = guiasturist::all();
        return Inertia::render('Centrosturist/Index', [
            'centrosturist' => $centrosturist,
            'productos' => $productos,
            'actividadturist' => $actividadturist,
            'guiasturist' => $guiasturist,
        ]);
        // opcion de IA 
        // return Inertia::render('Centrosturist/Index', [
        // 'centrosturist'   => $centrosturist,
        // 'productos'       => producto::all(),
        // 'actividadturist' => actividadturist::all(),
        // 'guiasturist'     => guiasturist::all(),
        // ]);
        
    }
            

        // $productos = producto::all();
        // $centrosturisticos = centrosturist::with('producto:idproduct,nomproduct','actividadturist:idacttur,nomacttur')->get();
        // return Inertia::render('Centrosturist/Index', [
        //     'centrosturist' => $centrosturisticos,
        //     'productos' => $productos,
        //     'actividadturist' => actividadturist::all(),
        // ]);

        // $centrosturisticos = centrosturist::with('producto:idproduct,nomproduct','actividadturist:idacttur,')->get();

        // return Inertia::render('Centrosturist/Index', [
        //     'centrosturist' => $centrosturisticos,
        //     'productos' => $productos,
        // ]);
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(centrosturist $centrosturist)
    {
        $centrosturist->load([
            'producto:idproduct,nomproduct',
            'actividadturist:idacttur,nomacttur',              
            'guiasturist:idguiatur,nomguiatur',
            'guiasturist.actividadturist:idacttur,nomacttur' // esto es para mostrar las actividades por guia
        ]);

        return Inertia::render('Centrosturist/Show', [
            'centrosturist' => $centrosturist,
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(centrosturist $centrosturist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, centrosturist $centrosturist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(centrosturist $centrosturist)
    {
        $centrosturist->delete();
        return redirect('centrosturist')->with('success', 'Centro turístico eliminado con éxito');
    }
}
