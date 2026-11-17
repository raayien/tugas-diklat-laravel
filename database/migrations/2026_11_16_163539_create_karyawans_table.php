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
        // Schema::create('karyawans', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_departemen')->constrained('departemen');
            $table->string('nik', 5)->unique();
            $table->string('name', 50);
            $table->string('long_name', 100);
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('karyawans');
        Schema::dropIfExists('karyawan');
    }
};
