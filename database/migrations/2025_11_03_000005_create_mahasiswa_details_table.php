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
        Schema::create('mahasiswa_details', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('nim')->nullable();
            $table->unsignedBigInteger('dosen_pa_id')->nullable();
            $table->string('angkatan')->nullable();
            $table->string('program_studi')->nullable();
            $table->enum('status_mahasiswa', ['aktif', 'cuti', 'lulus', 'nonaktif'])->nullable();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('dosen_pa_id')->references('user_id')->on('dosen_details')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_details');
    }
};
