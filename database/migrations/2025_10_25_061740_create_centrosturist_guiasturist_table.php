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
        Schema::create('centrosturist_guiasturist', function (Blueprint $table) {
            $table->foreignId('idcentur')
                ->references('idcentur')
                ->on('centrosturists')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('idguiatur')
                ->references('idguiatur')
                ->on('guiasturists')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->primary(['idcentur', 'idguiatur']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centrosturist_guiasturist');
    }
};
