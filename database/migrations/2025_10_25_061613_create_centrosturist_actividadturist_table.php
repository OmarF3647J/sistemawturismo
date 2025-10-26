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
        Schema::create('centrosturist_actividadturist', function (Blueprint $table) {
            $table->foreignId('idcentur')->constrained('centrosturists', 'idcentur')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('idacttur')->constrained('actividadturists', 'idacttur')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['idcentur', 'idacttur']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centrosturist_actividadturist');
    }
};
