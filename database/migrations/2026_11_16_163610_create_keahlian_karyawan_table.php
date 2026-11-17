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
        // Schema::create('keahlian_karyawan', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('keahlian_karyawan', function (Blueprint $table) {
            $table->foreignId('id_karyawan')->constrained('karyawan')->cascadeOnDelete();
            $table->foreignId('id_keahlian')->constrained('keahlian')->cascadeOnDelete();
            $table->primary(['id_karyawan', 'id_keahlian']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keahlian_karyawan');
    }
};
