<?php

namespace App\Http\Controllers;

use App\Models\serviciosturist;
use App\Models\centrosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ServiciosturistController extends Controller
{
    public function index()
    {
        $serviciosturist = serviciosturist::with('centrosturist')->get();
        $centrosturist = centrosturist::all();
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
    public function show(serviciosturist $serviciosturist)
    {
        //
    }

    public function edit(serviciosturist $serviciosturist)
    {
        //
    }

    public function update(Request $request, serviciosturist $serviciosturist)
    {
        $request->validate([
            'nomsertur' => 'required|string|max:25',
        ]);
        $serviciosturist->update($request->input());
        return redirect()->route('serviciosturist.index');
    }

    public function destroy(serviciosturist $serviciosturist)
    {
        $serviciosturist->delete();
        return redirect()->route('serviciosturist.index');
    }
}
