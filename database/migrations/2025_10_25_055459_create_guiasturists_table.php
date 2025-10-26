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
        Schema::create('guiasturists', function (Blueprint $table) {
            $table->id('idguiatur');
            $table->string('nomguiatur', 80);
            $table->string('telguiatur', 10);
            $table->string('corguiatur', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guiasturists');
    }
};
