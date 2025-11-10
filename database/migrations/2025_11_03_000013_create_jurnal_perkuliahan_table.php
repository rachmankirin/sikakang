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
        Schema::create('jurnal_perkuliahan', function (Blueprint $table) {
            $table->id('jurnal_id');
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->integer('pertemuan_ke')->nullable();
            $table->date('tanggal_perkuliahan')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->text('materi')->nullable();
            $table->text('metode_pembelajaran')->nullable();
            $table->timestamps();

            $table->foreign('kelas_id')
                ->references('kelas_id')->on('kelas')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_perkuliahan');
    }
};
