<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('krs', function (Blueprint $table) {
            $table->id('krs_id');
            $table->unsignedBigInteger('mahasiswa_user_id')->nullable();
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->string('nilai_akhir_huruf')->nullable();
            $table->decimal('nilai_akhir_angka', 5, 2)->nullable();
            $table->enum('status_krs', ['diambil', 'selesai', 'batal'])->nullable();
            $table->timestamp('tanggal_ambil')->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_user_id')
                  ->references('user_id')->on('users')
                  ->onDelete('set null');

            $table->foreign('kelas_id')
                  ->references('kelas_id')->on('kelas')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
