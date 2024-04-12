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
        Schema::create('kontraks', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 25);
            $table->enum('jenis_kontrak', ['Baru', 'Perpanjang']);
            $table->unsignedTinyInteger('lama_kontrak');
            $table->unsignedInteger('basic_salary');
            $table->enum('status', ['0', '1', '2', "3"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraks');
    }
};
