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


// 1
Route::get('/apompal', function () {
    return view('apompal');
})->name('apompal');

Route::get('/reportes/Apompal-CentroTuristico', [ReporteController::class, 'generarPDF'])->name('reportes.Apompal-CentroTuristico');



// 2
Route::get('/arrecifes', function () {
    return view('arrecifes');
})->name('arrecifes');

// 3
Route::get('/benitojuarez', function () {
    return view('benitojuarez');
})->name('benitojuarez');

// 4
Route::get('/cabanasencantadas', function () {
    return view('cabanasencantadas');
})->name('cabanasencantadas');

// 5
Route::get('/cascadasencantadas', function () {
    return view('cascadasencantadas');
})->name('cascadasencantadas');

// 6
Route::get('/ceytaks', function () {
    return view('ceytaks');
})->name('ceytaks');

// 7
Route::get('/elmirador', function () {
    return view('elmirador');
    })->name('elmirador');

// 8
Route::get('/jomxuk', function () {
    return view('jomxuk');
})->name('jomxuk');

// 9
Route::get('/kantasejkan', function () {
    return view('kantasejkan');
})->name('kantasejkan');

// 10
Route::get('/lagunadelostion', function () {
    return view('lagunadelostion');
})->name('lagunadelostion');


// 11
Route::get('/lasmargaritas', function () {
    return view('lasmargaritas');
})->name('lasmargaritas');

// 12
Route::get('/manglaressontecomapan', function () {
    return view('manglaressontecomapan');
})->name('manglaressontecomapan');

// 13
Route::get('/ranchodonaelia', function () {
    return view('ranchodonaelia');
})->name('ranchodonaelia');

// 14
Route::get('/rocapartida', function () {
    return view('rocapartida');
})->name('rocapartida');

// 15
Route::get('/selvaelmarinero', function () {
    return view('selvaelmarinero');
})->name('selvaelmarinero');



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
