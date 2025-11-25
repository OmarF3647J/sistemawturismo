<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('centrosturist_serviciosturist', function (Blueprint $table) {
            $table->foreignId('idcentur')
                ->references('idcentur') ->on('centrosturists')
                ->cascadeOnDelete() ->cascadeOnUpdate();
            $table->foreignId('idsertur') 
                ->references('idsertur') ->on('serviciosturists')
                ->cascadeOnDelete() ->cascadeOnUpdate();
            $table->primary(['idcentur', 'idsertur']);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('centrosturist_serviciosturist');
    }
};
