<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\centrosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $producto = producto::with('centrosturist')->get();
        $centrosturist = centrosturist::all();
        return Inertia::render('Producto/Index', [
            'producto' => $producto,
            'centrosturist' => $centrosturist,
        ]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'nomproduct' => 'required|string|max:50',
        ]); 
        $producto = new Producto($request->input());
        $producto->save();
        return redirect()->route('producto.index');
    }
    public function show(producto $producto)
    {
        //
    }
    public function edit(producto $producto)
    {
        //
    }
    public function update(Request $request, producto $producto)
    {
        $request->validate([
            'nomproduct' => 'required|string|max:50',
        ]);
        $producto->update($request->input());
        return redirect()->route('producto.index');
    }
    public function destroy(producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
