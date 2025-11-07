<?php

namespace App\Http\Controllers;

use App\Models\serviciosturist;
use App\Models\centrosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ServiciosturistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviciosturist = serviciosturist::with('centrosturist')->get();
        $centrosturist = centrosturist::all();
        return Inertia::render('Serviciosturist/Index', [
            'serviciosturist' => $serviciosturist,
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
        $request->validate([
            'nomsertur' => 'required|string|max:25',
        ]); 
        $serviciosturist = new Serviciosturist($request->input());
        $serviciosturist->save();
        return redirect()->route('serviciosturist.index');
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
        $request->validate([
            'nomsertur' => 'required|string|max:25',
        ]);
        $serviciosturist->update($request->input());
        return redirect()->route('serviciosturist.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(serviciosturist $serviciosturist)
    {
        $serviciosturist->delete();
        return redirect()->route('serviciosturist.index');
    }
}
