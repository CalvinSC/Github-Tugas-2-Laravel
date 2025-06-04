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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->String('npm', 11);
            $table->String('nama', 30);
            $table->enum('jenis_kelamin',['L','P']);
            $table->date('tanggal_lahir');
            $table->String('tempat_lahir', 30);
            $table->String('asal_sma', 100);
            $table->String('foto', 100);
            $table->foreignId('prodi_id')->constrained('prodi')->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa'); 
    }
};
