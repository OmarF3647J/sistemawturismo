<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\centrosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = producto::with('centrosturist')->get();
        // los nombre de las relaciones deben coincidir con los definidos en el modelo
        // centrosturist es la relacion definida en el modelo producto
        $centrosturist = centrosturist::all();
        return Inertia::render('Producto/Index', [
            'producto' => $producto,
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
            'nomproduct' => 'required|string|max:50',
        ]); 
        $producto = new Producto($request->input());
        $producto->save();
        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, producto $producto)
    {
        $request->validate([
            'nomproduct' => 'required|string|max:50',
        ]);
        $producto->update($request->input());
        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
