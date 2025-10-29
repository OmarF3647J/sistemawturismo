<?php

namespace App\Http\Controllers;

use App\Models\centrosturist;
use App\Models\producto;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CentrosturistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = producto::all();
        $centrosturisticos = centrosturist::with('producto:idproduct,nomproduct')->get();
        return Inertia::render('Centrosturist/Index', [
            'centrosturist' => $centrosturisticos,
            'productos' => $productos,
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
    public function show(centrosturist $centrosturist)
    {
        //
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
        //
    }
}
