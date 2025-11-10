<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('centrosturists', function (Blueprint $table) {
            $table->id('idcentur'); // Clave primaria personalizada
            $table->string('nomcentur', 255); // Nombre del centro turístico
            $table->text('descentur')->nullable(); // Descripción del centro
            $table->string('ubicacion', 255)->nullable(); // Dirección o ubicación
            $table->string('telefono', 20)->nullable(); // Teléfono de contacto
            $table->string('correo', 255)->nullable(); // Correo electrónico
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('centrosturists');
    }
};
