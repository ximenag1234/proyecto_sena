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
        Schema::create('breed_toy', function (Blueprint $table) {
            $table->foreignId('breed_id')->constrained()->cascadeOnDelete();
            $table->foreignId('toy_id')->constrained()->cascadeOnDelete();

            $table->primary(['breed_id', 'toy_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breed_toy');
    }
};
