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
        Schema::create('fakultas', function (Blueprint $table) {
            $table->id(); //primary key, auto-incrementing, bigint
            $table->String('nama', 50);
            $table->String('singkatan', 5);
            $table->String('dekan', 30);
            $table->String('wakil_dekan', 30);
            $table->timestamps(); // created_at, updated_at columns

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakultas');
    }
};
