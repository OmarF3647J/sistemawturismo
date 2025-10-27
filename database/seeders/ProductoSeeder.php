<?php

namespace Database\Seeders;

use App\Models\producto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        producto::insert([
            ['nomproduct' => 'Servicios Turísticos Comunitarios'],
            ['nomproduct' => 'Sociedad Cooperativa de Responsabilidad Limitada'],
        ]);
        
    }
}
