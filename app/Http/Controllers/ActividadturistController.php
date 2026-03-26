<?php

namespace App\Http\Controllers;

use App\Models\Actividadturist;
use App\Models\Guiasturist;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ActividadturistController extends Controller
{
    public function index()
    {
        $actividadturist = Actividadturist::with('guiasturist')->get();
        $guiasturist = Guiasturist::all();
        return Inertia::render('Actividadturist/Index', [
            'actividadturist' => $actividadturist,
            'guiasturist' => $guiasturist,
        ]);

    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'nomacttur' => 'required|string|max:50',
        ]);
        $actividadturist = new Actividadturist($request->input());
        $actividadturist->save();
        return redirect()->route('actividadturist.index');
    }
    public function show(Actividadturist $actividadturist)
    {
        //
    }
    public function edit(Actividadturist $actividadturist)
    {
        //
    }
    public function update(Request $request, Actividadturist $actividadturist)
    {
        $request->validate([
            'nomacttur' => 'required|string|max:50',
        ]);
        $actividadturist->update($request->input());
        return redirect()->route('actividadturist.index');
    }
    public function destroy(Actividadturist $actividadturist)
    {
        $actividadturist->delete();
        return redirect()->route('actividadturist.index');
    }
}
