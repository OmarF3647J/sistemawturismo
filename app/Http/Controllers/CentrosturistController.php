<?php

namespace App\Http\Controllers;

use App\Models\Centrosturist;
use App\Models\Producto;
use App\Models\Actividadturist;
use App\Models\Guiasturist;
use App\Models\Serviciosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;


class CentrosturistController extends Controller
{
    public function index()
    {
        $centrosturist = Centrosturist::with('producto',
        'serviciosturist',
        'actividadturist',
        'guiasturist.actividadturist')
        ->paginate(10);

        $productos = Producto::all();
        $actividadturist = Actividadturist::all();
        $guiasturist = Guiasturist::all();
        $serviciosturist = Serviciosturist::all();
        return Inertia::render('Centrosturist/Index', [
            'centrosturist' => $centrosturist,
            'productos' => $productos,
            'actividadturist' => $actividadturist,
            'guiasturist' => $guiasturist,
            'serviciosturist' => $serviciosturist,
        ]);
    }



    public function create()
    {
        return Inertia::render('Centrosturist/Create', [
            'productos'       => Producto::all(),'actividadturist' => Actividadturist::all(),
            'guiasturist'     => Guiasturist::all(),'serviciosturist' => Serviciosturist::all(),
            'optionsActivo' => Centrosturist::ACTIVO_VALUES,
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nomcentur'   => 'required|max:80',
            'dircentur'   => 'required|max:100',
            'descentur'   => 'required|max:350',
            'rescentur'   => 'required|max:80',
            'horcentur' => 'required|max:100',
            'activo' => 'required|in:Si,No', 
            'telcentur'   => 'required|max:10',
            'corcentur'   => 'required|email|max:50', 
            'imgcentur'   => 'nullable|file|mimes:jpg,jpeg,png',
            'idproduct'   => 'required|exists:productos,idproduct',
            'idacttur'    => 'nullable|array', 
            'idacttur.*'  => 'exists:actividadturists,idacttur',
            'idguiatur'   => 'nullable|array', 
            'idguiatur.*' => 'exists:guiasturists,idguiatur',
            'idsertur'   => 'nullable|array', 
            'idsertur.*' => 'exists:serviciosturists,idsertur',
            
        ]);
        $centrosturist = new Centrosturist();
        $centrosturist->nomcentur = $data['nomcentur'];
        $centrosturist->dircentur = $data['dircentur'];
        $centrosturist->descentur = $data['descentur'];
        $centrosturist->horcentur = $data['horcentur'];
        $centrosturist->rescentur = $data['rescentur'];
        $centrosturist->activo = $data['activo'];
        $centrosturist->telcentur = $data['telcentur'];
        $centrosturist->corcentur = $data['corcentur'];
        $centrosturist->idproduct = $data['idproduct'];
        if ($request->hasFile('imgcentur')) {
            $path = $request->file('imgcentur')->store('img', 'public');
            $centrosturist->imgcentur = $path;
        } else {
            $centrosturist->imgcentur = null;
        }   
        $centrosturist->save();
        $centrosturist->actividadturist()->sync($request->input('idacttur', []));
        $centrosturist->guiasturist()->sync($request->input('idguiatur', []));
        $centrosturist->serviciosturist()->sync($request->input('idsertur', []));
        return redirect('centrosturist/create')->with('success','Centro Turístico creado con éxito');
    
    }

    public function updatecentrosturist(Request $request)
    {
        $data = $request->validate([
            'idcentur'    => 'required|exists:centrosturists,idcentur',
            'nomcentur'   => 'required|max:80',
            'dircentur'   => 'required|max:100', 
            'descentur'   => 'required|max:350',
            'rescentur'   => 'required|max:80', 
            'horcentur' => 'required|max:100',
            'activo'      => 'required',
            'telcentur'   => 'required|max:10', 
            'corcentur'   => 'required|email|max:50',
            'idproduct'   => 'required|exists:productos,idproduct', 
            'idacttur'    => 'nullable|array',
            'idacttur.*'  => 'exists:actividadturists,idacttur', 
            'idguiatur'   => 'nullable|array',
            'idguiatur.*' => 'exists:guiasturists,idguiatur', 
            'idsertur'   => 'nullable|array',
            'idsertur.*' => 'exists:serviciosturists,idsertur', 
            'imgcentur'   => 'nullable|file|mimes:jpg,jpeg,png',
        ]);
        $data['activo'] = ucfirst(strtolower($data['activo']));
        $centrosturist = Centrosturist::findOrFail($data['idcentur']);
        $centrosturist->nomcentur = $data['nomcentur'];
        $centrosturist->dircentur = $data['dircentur'];
        $centrosturist->descentur = $data['descentur'];
        $centrosturist->horcentur = $data['horcentur'];
        $centrosturist->rescentur = $data['rescentur'];
        $centrosturist->activo = $data['activo'];
        $centrosturist->telcentur = $data['telcentur'];
        $centrosturist->corcentur = $data['corcentur'];
        $centrosturist->idproduct = $data['idproduct'];
        if ($request->hasFile('imgcentur')) {
            if ($centrosturist->imgcentur && Storage::disk('public')->exists($centrosturist->imgcentur)) {
                Storage::disk('public')->delete($centrosturist->imgcentur);
            }
            $path = $request->file('imgcentur')->store('img', 'public');
            $centrosturist->imgcentur = $path;
        }
        $centrosturist->save();
        $centrosturist->actividadturist()->sync($request->input('idacttur', []));
        $centrosturist->guiasturist()->sync($request->input('idguiatur', []));
        $centrosturist->serviciosturist()->sync($request->input('idsertur', []));
        return redirect()->route('centrosturist.index', $centrosturist->idcentur)
                        ->with('success', 'Centro Turístico actualizado con éxito');
    }



    
    public function show(Centrosturist $centrosturist)
    {
        $centrosturist->load([
            'producto:idproduct,nomproduct',
            'actividadturist:idacttur,nomacttur',              
            'guiasturist',
            'serviciosturist:idsertur,nomsertur',
            'guiasturist.actividadturist:idacttur,nomacttur' // esto es para mostrar las actividades por guia
        ]);

        return Inertia::render('Centrosturist/Show', [
            'centrosturist' => $centrosturist,
        ]);
    }
    public function edit(Centrosturist $centrosturist)
    {
        return Inertia::render('Centrosturist/Edit', [
            'centrosturist' => $centrosturist,
            'productos'       => Producto::all(),
            'actividadturist' => Actividadturist::all(),
            'guiasturist'     => Guiasturist::all(),
            'serviciosturist' => Serviciosturist::all(),
            'centrosturist_actividadturist' => $centrosturist->actividadturist()->pluck('actividadturists.idacttur')->toArray(),
            'centrosturist_guiasturist'     => $centrosturist->guiasturist()->pluck('guiasturists.idguiatur')->toArray(),
            'centrosturist_serviciosturist'     => $centrosturist->serviciosturist()->pluck('serviciosturists.idsertur')->toArray(),

        ]);
    }
    public function update(Request $request, Centrosturist $centrosturist)
    {

    }
    public function destroy(Centrosturist $centrosturist)
    {
        if ($centrosturist->imgcentur) {
            Storage::disk('public')->delete($centrosturist->imgcentur);
        }

        $centrosturist->delete();
        return redirect()->route('centrosturist.index')->with('success', 'Centro turístico eliminado con éxito');
    }
    public function pdf(Centrosturist $centrosturist)
    {
        $centrosturist->load([
            'producto',
            'actividadturist',
            'guiasturist',
            'guiasturist.actividadturist'
        ]);
        $pdf = Pdf::loadView('pdf.centro', compact('centrosturist'))
                ->setPaper('letter', 'portrait');
        return $pdf->stream("centro_{$centrosturist->idcentur}.pdf");
    }
}