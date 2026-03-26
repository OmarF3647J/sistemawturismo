<?php

namespace App\Http\Controllers;

use App\Models\Serviciosturist;
use App\Models\Centrosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ServiciosturistController extends Controller
{
    public function index()
    {
        $serviciosturist = Serviciosturist::with('centrosturist')->get();
        $centrosturist = Centrosturist::all();
        return Inertia::render('Serviciosturist/Index', [
            'serviciosturist' => $serviciosturist,
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
            'nomsertur' => 'required|string|max:25',
        ]); 
        $serviciosturist = new Serviciosturist($request->input());
        $serviciosturist->save();
        return redirect()->route('serviciosturist.index');
    }
    public function show(Serviciosturist $serviciosturist)
    {
        //
    }

    public function edit(Serviciosturist $serviciosturist)
    {
        //
    }

    public function update(Request $request, Serviciosturist $serviciosturist)
    {
        $request->validate([
            'nomsertur' => 'required|string|max:25',
        ]);
        $serviciosturist->update($request->input());
        return redirect()->route('serviciosturist.index');
    }

    public function destroy(Serviciosturist $serviciosturist)
    {
        $serviciosturist->delete();
        return redirect()->route('serviciosturist.index');
    }
}
