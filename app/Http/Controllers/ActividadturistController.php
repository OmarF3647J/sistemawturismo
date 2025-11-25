<?php

namespace App\Http\Controllers;

use App\Models\actividadturist;
use App\Models\guiasturist;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ActividadturistController extends Controller
{
    public function index()
    {
        $actividadturist = actividadturist::with('guiasturist')->get();
        $guiasturist = guiasturist::all();
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
    public function show(actividadturist $actividadturist)
    {
        //
    }
    public function edit(actividadturist $actividadturist)
    {
        //
    }
    public function update(Request $request, actividadturist $actividadturist)
    {
        $request->validate([
            'nomacttur' => 'required|string|max:50',
        ]);
        $actividadturist->update($request->input());
        return redirect()->route('actividadturist.index');
    }
    public function destroy(actividadturist $actividadturist)
    {
        $actividadturist->delete();
        return redirect()->route('actividadturist.index');
    }
}
