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
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id('pengumuman_id');
            $table->unsignedBigInteger('user_pembuat_id')->nullable();
            $table->string('judul')->nullable();
            $table->text('konten')->nullable();
            $table->dateTime('tanggal_publish')->nullable();
            $table->dateTime('tanggal_berakhir')->nullable();
            $table->boolean('is_active')->nullable();
            $table->enum('prioritas', ['rendah', 'normal', 'tinggi'])->nullable();

            $table->foreign('user_pembuat_id')
                  ->references('user_id')->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
