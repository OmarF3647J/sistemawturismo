<?php

namespace Database\Seeders;

use App\Models\{User,producto, centrosturist, serviciosturist, guiasturist, actividadturist};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            ProductoSeeder::class,
            ServiciosturistSeeder::class,
            ActividadturistSeeder::class,
        ]);
        $centros = centrosturist::factory(15)->create();
        $guias =  guiasturist::factory(12)->create();

        $servicios = serviciosturist::all();
        $actividades = actividadturist::all();

        foreach ($centros as $centro) {
            $centro->servicios()->attach($servicios->random(4)); // 2 servicios
            $centro->actividades()->attach($actividades->random(4)); // 3 actividades
            $centro->guias()->attach($guias->random(4)); // 2 guías
        }

        // Guías con actividades
        foreach ($guias as $guia) {
            $guia->actividades()->attach($actividades->random(4));
        }

    }
}
