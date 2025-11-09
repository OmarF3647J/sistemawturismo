<?php

namespace App\Http\Controllers;

use App\Models\guiasturist;
use App\Models\actividadturist;
use App\Models\centrosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class GuiasturistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guiasturist = guiasturist::with('actividadturist', 'centrosturist')->paginate(10);
        // los nombre de las relaciones deben coincidir con los definidos en el modelo
        // actividadturist es la relacion definida en el modelo guiasturist
        $actividadturist = actividadturist::all();
        $centrosturist = centrosturist::all();
        return Inertia::render('Guiasturist/Index', [
            'guiasturist' => $guiasturist,
            'actividadturist' => $actividadturist,
            'centrosturist' => $centrosturist,
        ]);
    }

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
    public function show(guiasturist $guiasturist)
    {
        $guiasturist->load([
            'centrosturist:idcentur,nomcentur',
            'actividadturist:idacttur,nomacttur',              
        ]);

        return Inertia::render('Guiasturist/Show', [
            'guiasturist' => $guiasturist,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(guiasturist $guiasturist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, guiasturist $guiasturist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(guiasturist $guiasturist)
    {
        $guiasturist->delete();
        return redirect('guiasturist')->with('succes', 'Agencia turística eliminada correctamente');
    }
}
