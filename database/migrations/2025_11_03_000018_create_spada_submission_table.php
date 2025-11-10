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
        Schema::create('spada_submission', function (Blueprint $table) {
            $table->id('submission_id');
            $table->unsignedBigInteger('activity_id')->nullable();
            $table->unsignedBigInteger('mahasiswa_user_id')->nullable();
            $table->decimal('nilai', 5, 2)->nullable();
            $table->text('file_path')->nullable();
            $table->dateTime('waktu_submit')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();

            $table->foreign('activity_id')
                ->references('activity_id')->on('spada_activities')
                ->onDelete('set null');

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
        Schema::dropIfExists('spada_submission');
    }
};
