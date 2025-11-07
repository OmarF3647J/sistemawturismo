<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitioController;


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

<<<<<<< Updated upstream
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
=======

// Página principal (Landing Page - /)


Route::get('/', [SitioController::class, 'inicio'])->name('inicio');
Route::get('/centro/{nombre}', [SitioController::class, 'centro'])->name('centro.mostrar');
Route::get('/guia/{nombre}', [SitioController::class, 'guia'])->name('guia.mostrar');

Route::get('/apompal', function () {
    return view('apompal');
})->name('apompal');


//Route::get('/', function () {
    //return Inertia::render('Welcome', [
         //'canLogin' => Route::has('login'),
         //'canRegister' => Route::has('register'),
         //'laravelVersion' => Application::VERSION,
         //'phpVersion' => PHP_VERSION,
     //]);
    //return redirect('/dashboard');
//});
>>>>>>> Stashed changes

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
