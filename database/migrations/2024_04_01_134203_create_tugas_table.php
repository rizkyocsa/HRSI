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
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 25);
            $table->string('nama_project', 100);
            $table->string('nama_modul', 100);
            $table->date('date_start');
            $table->date('date_end');
            $table->unsignedInteger('jam_kerja')->nullable();
            $table->unsignedInteger('value');
            $table->unsignedInteger('bonus');
            $table->string('catatan', 100)->nullable();
            $table->enum('status', ['In Progress', 'Onreview', 'Accept', 'Reject']);
            $table->enum('status_penyelesaian', ['In Progress', 'Ontime', 'Ahead of Schedule', 'Lagging of Schedule', 'Take Over']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
