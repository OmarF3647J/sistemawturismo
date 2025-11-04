<?php

namespace App\Http\Controllers;

use App\Models\actividadturist;
use App\Models\guiasturist;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ActividadturistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $actividadturist = actividadturist::with('centrosturist','guiasturist')->get();
        $actividadturist = actividadturist::with('guiasturist')->get();
        $guiasturist = guiasturist::all();
        return Inertia::render('Actividadturist/Index', [
            'actividadturist' => $actividadturist,
            'guiasturist' => $guiasturist,
        ]);

        // $actividadturist = actividadturist::all();
        // return Inertia::render('Actividadturist/Index', [
        //     'actividadturist' => $actividadturist,
        // ]);
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
    public function show(actividadturist $actividadturist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(actividadturist $actividadturist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, actividadturist $actividadturist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(actividadturist $actividadturist)
    {
        //
    }
}
