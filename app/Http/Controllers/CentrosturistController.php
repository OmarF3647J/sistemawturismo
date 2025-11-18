<?php

namespace App\Http\Controllers;

use App\Models\centrosturist;
use App\Models\producto;
use App\Models\actividadturist;
use App\Models\guiasturist;
use App\Models\serviciosturist;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf; // para dompdf


class CentrosturistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centrosturist = centrosturist::with('producto','serviciosturist','actividadturist','guiasturist.actividadturist')->paginate(10);
        // los nombre de las relaciones deben coincidir con los definidos en el modelo
        // producto y actividadturist son las relaciones definidas en el modelo centrosturist
        $productos = producto::all();
        $actividadturist = actividadturist::all();
        $guiasturist = guiasturist::all();
        $serviciosturist =serviciosturist::all();
        return Inertia::render('Centrosturist/Index', [
            'centrosturist' => $centrosturist,
            'productos' => $productos,
            'actividadturist' => $actividadturist,
            'guiasturist' => $guiasturist,
            'serviciosturist' => $serviciosturist,
        ]);
        // opcion de IA 
        // return Inertia::render('Centrosturist/Index', [
        // 'centrosturist'   => $centrosturist,
        // 'productos'       => producto::all(),
        // 'actividadturist' => actividadturist::all(),
        // 'guiasturist'     => guiasturist::all(),
        // ]);
        
    }
            

        // $productos = producto::all();
        // $centrosturisticos = centrosturist::with('producto:idproduct,nomproduct','actividadturist:idacttur,nomacttur')->get();
        // return Inertia::render('Centrosturist/Index', [
        //     'centrosturist' => $centrosturisticos,
        //     'productos' => $productos,
        //     'actividadturist' => actividadturist::all(),
        // ]);

        // $centrosturisticos = centrosturist::with('producto:idproduct,nomproduct','actividadturist:idacttur,')->get();

        // return Inertia::render('Centrosturist/Index', [
        //     'centrosturist' => $centrosturisticos,
        //     'productos' => $productos,
        // ]);
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Centrosturist/Create', [
            'productos'       => producto::all(),
            'actividadturist' => actividadturist::all(),
            'guiasturist'     => guiasturist::all(),
            'serviciosturist' => serviciosturist::all(),
            'optionsActivo' => Centrosturist::ACTIVO_VALUES,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'nomcentur'   => 'required|max:80',
        'dircentur'   => 'required|max:100',
        'descentur'   => 'required|max:350',
        'rescentur'   => 'required|max:80',
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

    // Crear modelo con los campos concretos (usar fill si tienes $fillable)
    $centrosturist = new centrosturist();
    $centrosturist->nomcentur = $data['nomcentur'];
    $centrosturist->dircentur = $data['dircentur'];
    $centrosturist->descentur = $data['descentur'];
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

    // sincronizar relaciones many-to-many (tabla pivot)
    // si no viene, pasamos array vacío para no dejar residuos
    $centrosturist->actividadturist()->sync($request->input('idacttur', []));
    $centrosturist->guiasturist()->sync($request->input('idguiatur', []));
    $centrosturist->serviciosturist()->sync($request->input('idsertur', []));
    
// return redirect()->route('centrosturist.index')
//     ->with('success', 'Centro Turístico creado con éxito');

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
    $centrosturist = centrosturist::findOrFail($data['idcentur']);

    $centrosturist->nomcentur = $data['nomcentur'];
    $centrosturist->dircentur = $data['dircentur'];
    $centrosturist->descentur = $data['descentur'];
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



    
    public function show(centrosturist $centrosturist)
    {
        $centrosturist->load([
            'producto:idproduct,nomproduct',
            'actividadturist:idacttur,nomacttur',              
            'guiasturist:idguiatur,nomguiatur',
            'serviciosturist:idsertur,nomsertur',
            'guiasturist.actividadturist:idacttur,nomacttur' // esto es para mostrar las actividades por guia
        ]);

        return Inertia::render('Centrosturist/Show', [
            'centrosturist' => $centrosturist,
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(centrosturist $centrosturist)
    {
        return Inertia::render('Centrosturist/Edit', [
            'centrosturist' => $centrosturist,
            'productos'       => producto::all(),
            'actividadturist' => actividadturist::all(),
            'guiasturist'     => guiasturist::all(),
            'serviciosturist' => serviciosturist::all(),
            'centrosturist_actividadturist' => $centrosturist->actividadturist()->pluck('actividadturists.idacttur')->toArray(),
            'centrosturist_guiasturist'     => $centrosturist->guiasturist()->pluck('guiasturists.idguiatur')->toArray(),
            'centrosturist_serviciosturist'     => $centrosturist->serviciosturist()->pluck('serviciosturists.idsertur')->toArray(),

        ]);

        // $centrosturist->load([
        //     'producto:idproduct,nomproduct',
        //     'actividadturist:idacttur,nomacttur',              
        //     'guiasturist:idguiatur,nomguiatur',
        //     'guiasturist.actividadturist:idacttur,nomacttur' // esto es para mostrar las actividades por guia
        // ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, centrosturist $centrosturist)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(centrosturist $centrosturist)
    {
        // eliminar imagen asociada si existe
        if ($centrosturist->imgcentur) {
            Storage::disk('public')->delete($centrosturist->imgcentur);
        }

        $centrosturist->delete();
        // return back()->with('success', 'Centro turístico eliminado con éxito');
        return redirect()->route('centrosturist.index')->with('success', 'Centro turístico eliminado con éxito');
    }




















    /**
 * Generar y mostrar/guardar PDF del centro turístico
 */
public function pdf(centrosturist $centrosturist)
{
    $centrosturist->load([
        'producto',
        'actividadturist',
        'guiasturist',
        'guiasturist.actividadturist'
    ]);


    $pdf = Pdf::loadView('pdf.centro', compact('centrosturist'))
              ->setPaper('letter', 'portrait');


    // Mostrar el PDF en nueva pestaña
    return $pdf->stream("centro_{$centrosturist->idcentur}.pdf");
}


}




