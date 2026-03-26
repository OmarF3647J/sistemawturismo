<?php

namespace App\Http\Controllers;

use App\Models\Guiasturist;
use App\Models\Actividadturist;
use App\Models\Centrosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class GuiasturistController extends Controller
{
    public function index()
    {
        $guiasturist = Guiasturist::with('actividadturist', 'centrosturist')->paginate(10);
        $actividadturist = Actividadturist::all();
        $centrosturist = Centrosturist::all();
        return Inertia::render('Guiasturist/Index', [
            'guiasturist' => $guiasturist,
            'actividadturist' => $actividadturist,
            'centrosturist' => $centrosturist,
        ]);
    }

    public function create()
    {
        return Inertia::render('Guiasturist/Create', [
            'actividadturist' => Actividadturist::all(),
            'centrosturist' => Centrosturist::all(),
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

        $guiasturist = new Guiasturist();
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

        $guiasturist = Guiasturist::findOrFail($data['idguiatur']);
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
    public function show(Guiasturist $guiasturist)
    {
        $guiasturist->load([
            'centrosturist:idcentur,nomcentur',
            'actividadturist:idacttur,nomacttur',              
        ]);

        return Inertia::render('Guiasturist/Show', [
            'guiasturist' => $guiasturist,
        ]);
    }
    public function edit(Guiasturist $guiasturist)
    {
        
        return Inertia::render('Guiasturist/Edit', [
            'guiasturist' => $guiasturist,
            'actividadturist' => Actividadturist::all(),
            'centrosturist' => Centrosturist::all(),
            'guiasturist_actividadturist' => $guiasturist->actividadturist()->pluck('actividadturists.idacttur')->toArray(),
            'centrosturist_guiasturist' => $guiasturist->centrosturist()->pluck('centrosturists.idcentur')->toArray(),
        ]);
    }
    public function update(Request $request, Guiasturist $guiasturist)
    {
        
    }
    public function destroy(Guiasturist $guiasturist)
    {
        $guiasturist->delete();
        return redirect()->route('guiasturist.index')->with('success', 'Agencia turística eliminada correctamente');
    }
}
