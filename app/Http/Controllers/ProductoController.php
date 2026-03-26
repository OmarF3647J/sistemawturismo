<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Centrosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $producto = Producto::with('centrosturist')->get();
        $centrosturist = Centrosturist::all();
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
    public function show(Producto $producto)
    {
        //
    }
    public function edit(Producto $producto)
    {
        //
    }
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nomproduct' => 'required|string|max:50',
        ]);
        $producto->update($request->input());
        return redirect()->route('producto.index');
    }
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
