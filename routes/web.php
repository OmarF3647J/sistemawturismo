<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitioController;
use App\Http\Controllers\ReporteController;


use Inertia\Inertia;

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



// Página principal (Landing Page - /)


Route::get('/', [SitioController::class, 'inicio'])->name('inicio');

Route::get('/centro/{nombre}', [SitioController::class, 'centro'])->name('centro.mostrar');


// 1 impresion en vistas de blade.php
Route::get('/apompal', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('apompal', compact('centros'));
});
//reporte pdf
Route::get('/reportes/Apompal-CentroTuristico', [ReporteController::class, 'generarPDF'])->name('reportes.Apompal-CentroTuristico');



// 2
Route::get('/arrecifes', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('arrecifes', compact('centros'));
});

// 3
Route::get('/benitojuarez', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('benitojuarez', compact('centros'));
});

// 4
Route::get('/cabanasencantadas', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('benitojuarez', compact('centros'));
});

// 5
Route::get('/cascadasencantadas', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('cascadasencantadas', compact('centros'));
});


// 6
Route::get('/ceytaks', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('ceytaks', compact('centros'));
});

// 7
Route::get('/elmirador', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('elmirador', compact('centros'));
});

// 8
Route::get('/jomxuk', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('jomxuk', compact('centros'));
});


// 9
Route::get('/kantasejkan', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('kantasejkan', compact('centros'));
});


// 10
Route::get('/lagunadelostion', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('lagunadelostion', compact('centros'));
});


// 11
Route::get('/lasmargaritas', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('lasmargaritas', compact('centros'));
});

// 12
Route::get('/manglaressontecomapan', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('manglaressontecomapan', compact('centros'));
});

// 13
Route::get('/ranchodonaelia', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('ranchodonaelia', compact('centros'));
});

// 14
Route::get('/rocapartida', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('rocapartida', compact('centros'));
});

// 15
Route::get('/selvaelmarinero', function () {
    $centros = CentroTurist::all(); // o el query que uses
    return view('selvaelmarinero', compact('centros'));
});  


//Route::get('/', function () {
    //return Inertia::render('Welcome', [
         //'canLogin' => Route::has('login'),
         //'canRegister' => Route::has('register'),
         //'laravelVersion' => Application::VERSION,
         //'phpVersion' => PHP_VERSION,
     //]);
    //return redirect('/dashboard');
//});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
