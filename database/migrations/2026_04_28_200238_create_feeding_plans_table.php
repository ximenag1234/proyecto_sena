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
        Schema::create('feeding_plans', function (Blueprint $table) {
            $table->id();
            $table->string('food_type');
            $table->string('amount');
            $table->string('frequency');
            $table->integer('age_min')->nullable();
            $table->integer('age_max')->nullable();
            $table->decimal('weight_min', 5, 2)->nullable();
            $table->decimal('weight_max', 5, 2)->nullable();

            $table->foreignId('breed_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeding_plans');
    }
};
