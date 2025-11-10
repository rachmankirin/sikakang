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
        Schema::create('spada_courses', function (Blueprint $table) {
            $table->id('spada_course_id');
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->string('kode_course')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('file_path')->nullable();
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
        Schema::dropIfExists('spada_courses');
    }
};
