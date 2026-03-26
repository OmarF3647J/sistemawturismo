<?php

namespace Database\Seeders;

use App\Models\{User,Producto, Centrosturist, Serviciosturist, Guiasturist, Actividadturist};
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
        $centros = Centrosturist::factory(15)->create();
        $guias =  Guiasturist::factory(12)->create();

        $servicios = Serviciosturist::all();
        $actividades = Actividadturist::all();

        foreach ($centros as $centro) {
            $centro->serviciosturist()->attach($servicios->random(4)); // 2 servicios
            $centro->actividadturist()->attach($actividades->random(4)); // 3 actividades
            $centro->guiasturist()->attach($guias->random(4)); // 2 guías
        }

        // Guías con actividades
        foreach ($guias as $guia) {
            $guia->actividadturist()->attach($actividades->random(4));
        }

    }
}
