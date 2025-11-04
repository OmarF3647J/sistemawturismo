<?php

namespace App\Http\Controllers;

use App\Models\serviciosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ServiciosturistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviciosturist = serviciosturist::all();
        return Inertia::render('Serviciosturist/Index', [
            'serviciosturist' => $serviciosturist,
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
    public function show(serviciosturist $serviciosturist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(serviciosturist $serviciosturist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, serviciosturist $serviciosturist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(serviciosturist $serviciosturist)
    {
        //
    }
}
