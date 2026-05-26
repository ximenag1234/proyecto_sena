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
        Schema::create('bath_routines', function (Blueprint $table) {
            $table->id();
            $table->string('frequency');
            $table->integer('age_min')->nullable();
            $table->integer('age_max')->nullable();

            $table->foreignId('breed_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bath_routines');
    }
};
