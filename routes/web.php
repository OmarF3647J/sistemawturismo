
<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitioController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\View; // Agregamos la clase View
use App\Models\CentroTurist; // Agregamos tu modelo


use Inertia\Inertia;
use App\Http\Controllers\CentrosturistController;
use App\Http\Controllers\ActividadturistController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });



















Route::get('/turismocomunitario', [SitioController::class, 'inicio'])->name('inicio');

Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return redirect('/dashboard');
});

Route::get('/centro/{nombre}', [SitioController::class, 'centro'])->name('centro.mostrar');


// 1 impresion en vistas de blade.php
Route::get('/apompal', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('apompal', compact('centros'));
})->name('apompal'); 

////reporte pdf
Route::get('/reportes/Apompal-CentroTuristico', [ReporteController::class, 'generarPDF'])->name('reportes.Apompal-CentroTuristico');



// 2
Route::get('/arrecifes', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('arrecifes', compact('centros'));
})->name('arrecifes');

// 3
Route::get('/benitojuarez', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('benitojuarez', compact('centros'));
})->name('benitojuarez');

// 4
Route::get('/cabanasencantadas', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('cabanasencantadas', compact('centros'));
})->name('cabanasencantadas');

// 5
Route::get('/cascadasencantadas', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('cascadasencantadas', compact('centros'));
})->name('cascadasencantadas');


// 6
Route::get('/ceytaks', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('ceytaks', compact('centros'));
})->name('ceytaks');

// 7
Route::get('/elmirador', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('elmirador', compact('centros'));
})->name('elmirador');

// 8
Route::get('/jomxuk', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('jomxuk', compact('centros'));
})->name('jomxuk');


// 9
Route::get('/kantasejkan', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('kantasejkan', compact('centros'));
})->name('kantasejkan');


// 10
Route::get('/lagunadelostion', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('lagunadelostion', compact('centros'));
})->name('lagunadelostion');


// 11
Route::get('/lasmargaritas', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('lasmargaritas', compact('centros'));
})->name('lasmargaritas');

// 12
Route::get('/manglaressontecomapan', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('manglaressontecomapan', compact('centros'));
})->name('manglaressontecomapan');

// 13
Route::get('/ranchodonaelia', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('ranchodonaelia', compact('centros'));
})->name('ranchodonaelia');

// 14
Route::get('/rocapartida', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('rocapartida', compact('centros'));
})->name('rocapartida');

// 15
Route::get('/selvaelmarinero', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('selvaelmarinero', compact('centros'));
})->name('selvaelmarinero');










Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        // colección con relaciones para usar en la gráfica
        'centrosturist' => App\Models\Centrosturist::with('actividadturist')->get(),
        'guiasturist' => App\Models\Guiasturist::with('actividadturist')->get(),
        // conteos para mostrar en los cards (números simples)
        'centrosturist_count' => App\Models\Centrosturist::count(),
        'guiasturist_count' => App\Models\Guiasturist::count(),
        'actividadturist' => App\Models\Actividadturist::count(),
        'serviciosturist' => App\Models\Serviciosturist::count(),
        'producto' => App\Models\Producto::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('centrosturist', App\Http\Controllers\CentrosturistController::class);
    Route::resource('guiasturist', App\Http\Controllers\GuiasturistController::class);
    Route::resource('actividadturist', App\Http\Controllers\ActividadturistController::class);
    Route::resource('serviciosturist', App\Http\Controllers\ServiciosturistController::class);
    Route::resource('producto', App\Http\Controllers\ProductoController::class);
    Route::post('updatecentrosturist', [App\Http\Controllers\CentrosturistController::class, 'updatecentrosturist'])->name('updatecentrosturist');
    Route::post('updateguiasturist', [App\Http\Controllers\GuiasturistController::class, 'updateguiasturist'])->name('updateguiasturist');
    Route::get('/centrosturist/{centrosturist}/pdf', [CentrosturistController::class, 'pdf'])->name('centrosturist.pdf');
});

require __DIR__.'/auth.php';
