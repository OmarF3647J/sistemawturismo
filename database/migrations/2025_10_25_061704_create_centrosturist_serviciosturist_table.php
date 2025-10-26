<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('centrosturist_serviciosturist', function (Blueprint $table) {
            $table->foreignId('idcentur')->constrained('centrosturists', 'idcentur')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('idsertur')->constrained('serviciosturists', 'idsertur')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['idcentur', 'idsertur']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centrosturist_serviciosturist');
    }
};
