<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('serviciosturists', function (Blueprint $table) {
            $table->id('idsertur');
            $table->string('nomsertur', 25);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('serviciosturists');
    }
};
