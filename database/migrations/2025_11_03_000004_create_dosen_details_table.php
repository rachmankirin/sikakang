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
        Schema::create('dosen_details', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('nidn')->nullable();
            $table->string('jabatan_fungsional')->nullable();
            $table->string('bidang_keahlian')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_details');
    }
};
