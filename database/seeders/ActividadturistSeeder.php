<?php

namespace Database\Seeders;

use App\Models\Actividadturist;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActividadturistSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Actividadturist::insert([
            ['nomacttur' => 'Senderismo'],
            ['nomacttur' => 'Kayak'],
            ['nomacttur' => 'Ciclismo'],
            ['nomacttur' => 'Avistamiento de aves'],
            ['nomacttur' => 'Campismo'],
            ['nomacttur' => 'Pesca deportiva'],
            ['nomacttur' => 'Observación de estrellas'],
        ]);
    }
}