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
        Schema::create('spada_activities', function (Blueprint $table) {
            $table->id('activity_id');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->string('judul_activity')->nullable();
            $table->enum('tipe_activity', ['tugas', 'quiz', 'materi'])->nullable();
            $table->text('instruksi')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->decimal('bobot_nilai', 5, 2)->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();

            $table->foreign('section_id')
                ->references('section_id')->on('spada_section')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spada_activities');
    }
};
