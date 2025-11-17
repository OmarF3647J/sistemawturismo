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
        Schema::create('centrosturists', function (Blueprint $table) {
            $table->id('idcentur');
            $table->string('nomcentur', 80);
            $table->string('dircentur', 100);
            $table->string('descentur', 350);
            $table->string('rescentur', 80);
            $table->string('telcentur', 10);
            $table->string('corcentur', 50);
            $table->string('imgcentur', 100);
            // $table->enum('activo', ['Si', 'No']);
            $table->foreignId('idproduct')->nullable()->constrained('productos', 'idproduct')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centrosturists');
    }
};
