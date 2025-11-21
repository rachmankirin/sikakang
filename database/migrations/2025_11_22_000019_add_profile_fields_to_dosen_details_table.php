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
        Schema::table('dosen_details', function (Blueprint $table) {
            $table->string('jenis_kelamin')->nullable()->after('bidang_keahlian');
            $table->string('program_studi')->nullable()->after('jenis_kelamin');
            $table->string('fakultas')->nullable()->after('program_studi');
            $table->text('alamat')->nullable()->after('fakultas');
            $table->string('no_hp')->nullable()->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dosen_details', function (Blueprint $table) {
            $table->dropColumn(['jenis_kelamin', 'program_studi', 'fakultas', 'alamat', 'no_hp']);
        });
    }
};
