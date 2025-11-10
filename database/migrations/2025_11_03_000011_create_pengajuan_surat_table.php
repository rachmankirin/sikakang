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
        Schema::create('pengajuan_surat', function (Blueprint $table) {
            $table->id('pengajuan_id');
            $table->unsignedBigInteger('mahasiswa_user_id')->nullable();
            $table->unsignedBigInteger('jenis_surat_id')->nullable();
            $table->unsignedBigInteger('dosen_pa_id')->nullable();
            $table->enum('status_pengajuan', ['menunggu', 'disetujui', 'ditolak'])->nullable();
            $table->text('keperluan')->nullable();
            $table->dateTime('tanggal_keperluan')->nullable();
            $table->dateTime('tanggal_disetujui')->nullable();
            $table->text('catatan')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_user_id')
                  ->references('user_id')->on('users')
                  ->onDelete('set null');

            $table->foreign('jenis_surat_id')
                  ->references('jenis_surat_id')->on('jenis_surat')
                  ->onDelete('set null');

            $table->foreign('dosen_pa_id')
                  ->references('user_id')->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surat');
    }
};
