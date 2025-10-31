<?php

namespace App\Http\Controllers;

use App\Models\guiasturist;
use Inertia\Inertia;
use Illuminate\Http\Request;

class GuiasturistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guiasturist = guiasturist::all();
        return Inertia::render('Guiasturist/Index', [
            'guiasturist' => $guiasturist,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(guiasturist $guiasturist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(guiasturist $guiasturist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, guiasturist $guiasturist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(guiasturist $guiasturist)
    {
        //
    }
}
