<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bath_routines', function (Blueprint $table) {
            $table->foreignId('pet_id')
                ->nullable()
                ->after('user_id')
                ->constrained('pets')
                ->cascadeOnDelete();

            $table->string('bath_type')
                ->nullable()
                ->after('frequency');

            $table->string('description')
                ->nullable()
                ->after('bath_type');
        });
    }

    public function down(): void
    {
        Schema::table('bath_routines', function (Blueprint $table) {
            $table->dropForeign(['pet_id']);
            $table->dropColumn([
                'pet_id',
                'bath_type',
                'description',
            ]);
        });
    }
};