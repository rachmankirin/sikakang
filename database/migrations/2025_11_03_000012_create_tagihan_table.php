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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id('tagihan_id');
            $table->unsignedBigInteger('mahasiswa_user_id')->nullable();
            $table->string('jenis_tagihan')->nullable();
            $table->decimal('jumlah_tagihan', 10, 2)->nullable();
            $table->enum('status_pembayaran', ['belum', 'tertunda', 'lunas'])->nullable();
            $table->date('tanggal_jatuh_tempo')->nullable();
            $table->date('tanggal_pembayaran')->nullable();
            $table->string('semester')->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_user_id')
                ->references('user_id')->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
