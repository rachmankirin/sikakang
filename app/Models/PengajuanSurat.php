<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanSurat extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_surat';
    protected $primaryKey = 'pengajuan_id';

    protected $fillable = [
        'mahasiswa_user_id',
        'jenis_surat_id',
        'dosen_pa_id',
        'status_pengajuan',
        'keperluan',
        'tanggal_keperluan',
        'tanggal_disetujui',
        'catatan',
        'file_path',
    ];

    /**
     * Get the mahasiswa that owns the pengajuan.
     */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mahasiswa_user_id');
    }

    /**
     * Get the jenis surat for the pengajuan.
     */
    public function jenisSurat(): BelongsTo
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    /**
     * Get the dosen PA for the pengajuan.
     */
    public function dosenPa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dosen_pa_id');
    }
}
