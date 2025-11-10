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
        Schema::create('spada_section', function (Blueprint $table) {
            $table->id('section_id');
            $table->unsignedBigInteger('spada_course_id')->nullable();
            $table->string('judul_section')->nullable();
            $table->integer('urutan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            $table->foreign('spada_course_id')
                ->references('spada_course_id')->on('spada_courses')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spada_section');
    }
};
