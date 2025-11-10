<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisSurat extends Model
{
    use HasFactory;

    protected $table = 'jenis_surat';
    protected $primaryKey = 'jenis_surat_id';
    protected $fillable = [
        'nama_surat',
        'template_surat',
        'persyaratan',
        'estimasi_hari',
    ];

    /**
     * Get the pengajuan surat for the jenis surat.
     */
    public function pengajuanSurat(): HasMany
    {
        return $this->hasMany(PengajuanSurat::class, 'jenis_surat_id');
    }
}
