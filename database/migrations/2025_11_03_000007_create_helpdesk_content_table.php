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
        Schema::create('helpdesk_content', function (Blueprint $table) {
            $table->id('content_id');
            $table->unsignedBigInteger('user_pembuat_id')->nullable();
            $table->string('judul')->nullable();
            $table->text('konten')->nullable();
            $table->enum('tipe_konten', ['artikel', 'panduan', 'faq'])->nullable();
            $table->string('kategori')->nullable();
            $table->integer('view_count')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('helpdesk_content');
    }
};
