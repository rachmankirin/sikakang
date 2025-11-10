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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('kelas_id');
            $table->unsignedBigInteger('mk_id')->nullable();
            $table->unsignedBigInteger('dosen_pengampu_id')->nullable();
            $table->string('nama_kelas')->nullable();
            $table->string('tahun_ajar')->nullable();
            $table->enum('semester', ['ganjil', 'genap'])->nullable();
            $table->integer('kapasitas')->nullable();
            $table->timestamps();

            $table->foreign('mk_id')
                  ->references('mk_id')->on('mata_kuliah')
                  ->onDelete('set null');

            $table->foreign('dosen_pengampu_id')
                  ->references('user_id')->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
