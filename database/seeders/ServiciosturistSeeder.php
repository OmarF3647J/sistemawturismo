<?php

namespace Database\Seeders;

use App\Models\Serviciosturist;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiciosturistSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Serviciosturist::insert([
            ['nomsertur' => 'Hospedaje'],
            ['nomsertur' => 'Restaurante'],
            ['nomsertur' => 'Guía turística'],
            ['nomsertur' => 'Transporte'],
            ['nomsertur' => 'Renta de bicicletas'],
            ['nomsertur' => 'Artesanos locales'],
            ['nomsertur' => 'Tour en lancha'],
        ]);
    }
}
