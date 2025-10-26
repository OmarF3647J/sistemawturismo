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
        Schema::create('guiasturist_actividadturist', function (Blueprint $table) {
            $table->foreignId('idguiatur')->constrained('guiasturists', 'idguiatur')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('idacttur')->constrained('actividadturists', 'idacttur')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['idguiatur','idacttur']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guiasturist_actividadturist');
    }
};
