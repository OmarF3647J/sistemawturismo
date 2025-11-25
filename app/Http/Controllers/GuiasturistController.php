<?php

namespace App\Http\Controllers;

use App\Models\guiasturist;
use App\Models\actividadturist;
use App\Models\centrosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class GuiasturistController extends Controller
{
    public function index()
    {
        $guiasturist = guiasturist::with('actividadturist', 'centrosturist')->paginate(10);
        $actividadturist = actividadturist::all();
        $centrosturist = centrosturist::all();
        return Inertia::render('Guiasturist/Index', [
            'guiasturist' => $guiasturist,
            'actividadturist' => $actividadturist,
            'centrosturist' => $centrosturist,
        ]);
    }

    public function create()
    {
        return Inertia::render('Guiasturist/Create', [
            'actividadturist' => actividadturist::all(),
            'centrosturist' => centrosturist::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nomguiatur' => 'required|string|max:255',
            'nomresguiatur' => 'required|string|max:255',
            'telguiatur' => 'required|string|max:20',
            'corguiatur' => 'required|string|max:255',
            'imgguiatur' => 'nullable|file|mimes:jpg,jpeg,png',
            'idacttur'    => 'nullable|array',
            'idacttur.*'  => 'exists:actividadturists,idacttur',
            'idcentur' => 'nullable|array',
            'idcentur.*' => 'exists:centrosturists,idcentur',
        ]);

        $guiasturist = new guiasturist();
        $guiasturist->nomguiatur = $data['nomguiatur'];
        $guiasturist->nomresguiatur = $data['nomresguiatur'];
        $guiasturist->telguiatur = $data['telguiatur'];
        $guiasturist->corguiatur = $data['corguiatur'];
        if ($request->hasFile('imgguiatur')) {
            $path = $request->file('imgguiatur')->store('img', 'public');
            $guiasturist->imgguiatur = $path;
        } else {
            $guiasturist->imgguiatur = null;
        }
        $guiasturist->save();
        $guiasturist->actividadturist()->sync($request->input('idacttur', []));
        $guiasturist->centrosturist()->sync($request->input('idcentur', []));

        return redirect('guiasturist/create')->with('succes','Agencia turística creado con éxito');
    }

    public function updateguiasturist(Request $request)
    {
        $data = $request->validate([
            'idguiatur' => 'required|exists:guiasturists,idguiatur',
            'nomguiatur' => 'required|string|max:255',
            'nomresguiatur' => 'required|string|max:255',
            'telguiatur' => 'required|string|max:20',
            'corguiatur' => 'required|string|max:255',
            'imgguiatur' => 'nullable|file|mimes:jpg,jpeg,png',
            'idacttur'    => 'nullable|array',
            'idacttur.*'  => 'exists:actividadturists,idacttur',
            'idcentur' => 'nullable|array',
            'idcentur.*' => 'exists:centrosturists,idcentur',
        ]);

        $guiasturist = guiasturist::findOrFail($data['idguiatur']);
        $guiasturist->nomguiatur = $data['nomguiatur'];
        $guiasturist->nomresguiatur = $data['nomresguiatur'];
        $guiasturist->telguiatur = $data['telguiatur'];
        $guiasturist->corguiatur = $data['corguiatur'];

        if ($request->hasFile('imgguiatur')) {
            // eliminar imagen anterior si existe
            if ($guiasturist->imgguiatur) {
                Storage::disk('public')->delete($guiasturist->imgguiatur);
            }
            $path = $request->file('imgguiatur')->store('img', 'public');
            $guiasturist->imgguiatur = $path;
        }

        $guiasturist->save();

        $guiasturist->actividadturist()->sync($request->input('idacttur', []));
        $guiasturist->centrosturist()->sync($request->input('idcentur', []));

        return redirect()->route('guiasturist.index')->with('success', 'Guía turística actualizada correctamente.');
    }
    public function show(guiasturist $guiasturist)
    {
        $guiasturist->load([
            'centrosturist:idcentur,nomcentur',
            'actividadturist:idacttur,nomacttur',              
        ]);

        return Inertia::render('Guiasturist/Show', [
            'guiasturist' => $guiasturist,
        ]);
    }
    public function edit(guiasturist $guiasturist)
    {
        
        return Inertia::render('Guiasturist/Edit', [
            'guiasturist' => $guiasturist,
            'actividadturist' => actividadturist::all(),
            'centrosturist' => centrosturist::all(),
            'guiasturist_actividadturist' => $guiasturist->actividadturist()->pluck('actividadturists.idacttur')->toArray(),
            'centrosturist_guiasturist' => $guiasturist->centrosturist()->pluck('centrosturists.idcentur')->toArray(),
        ]);
    }
    public function update(Request $request, guiasturist $guiasturist)
    {
        
    }
    public function destroy(guiasturist $guiasturist)
    {
        $guiasturist->delete();
        return redirect()->route('guiasturist.index')->with('success', 'Agencia turística eliminada correctamente');
    }
}
