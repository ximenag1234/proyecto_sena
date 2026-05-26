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
        Schema::create('pet_health_condition', function (Blueprint $table) {
            $table->foreignId('pet_id')->constrained()->cascadeOnDelete();
            $table->foreignId('health_condition_id')->constrained()->cascadeOnDelete();

            $table->primary(['pet_id', 'health_condition_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_health_condition');
    }
};
