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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('absensi_id');
            $table->unsignedBigInteger('jurnal_id')->nullable();
            $table->unsignedBigInteger('mahasiswa_user_id')->nullable();
            $table->enum('status_kehadiran', ['hadir', 'izin', 'sakit', 'alpa'])->nullable();
            $table->time('waktu_absen')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('jurnal_id')
                ->references('jurnal_id')->on('jurnal_perkuliahan')
                ->onDelete('set null');

            $table->foreign('mahasiswa_user_id')
                ->references('user_id')->on('mahasiswa_details')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
