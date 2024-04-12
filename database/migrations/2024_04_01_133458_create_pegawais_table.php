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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->string('nip', 25)->primary();
            $table->string('nik', 16)->unique();
            $table->string('email', 100)->unique();
            $table->string('nama', 100);
            $table->string('tmp_lahir', 50);
            $table->date('tgl_lahir');
            $table->enum('jk', ['L', 'P']);
            $table->string('divisi', 36);
            $table->string('jabatan', 36);
            $table->date('tgl_masuk');
            $table->string('foto');
            $table->string('agama');
            $table->string('kewarganegaaraan', 100);
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
