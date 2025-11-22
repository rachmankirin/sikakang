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
        Schema::table('jurnal_perkuliahan', function (Blueprint $table) {
            $table->boolean('validasi_dosen')->default(false)->after('metode_pembelajaran');
            $table->unsignedBigInteger('dosen_validator_id')->nullable()->after('validasi_dosen');
            $table->timestamp('waktu_validasi_dosen')->nullable()->after('dosen_validator_id');
            
            $table->boolean('validasi_mahasiswa')->default(false)->after('waktu_validasi_dosen');
            $table->unsignedBigInteger('mahasiswa_validator_id')->nullable()->after('validasi_mahasiswa');
            $table->timestamp('waktu_validasi_mahasiswa')->nullable()->after('mahasiswa_validator_id');

            // Foreign keys
            $table->foreign('dosen_validator_id')
                ->references('user_id')->on('users')
                ->onDelete('set null');
            
            $table->foreign('mahasiswa_validator_id')
                ->references('user_id')->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jurnal_perkuliahan', function (Blueprint $table) {
            $table->dropForeign(['dosen_validator_id']);
            $table->dropForeign(['mahasiswa_validator_id']);
            
            $table->dropColumn([
                'validasi_dosen',
                'dosen_validator_id',
                'waktu_validasi_dosen',
                'validasi_mahasiswa',
                'mahasiswa_validator_id',
                'waktu_validasi_mahasiswa',
            ]);
        });
    }
};
