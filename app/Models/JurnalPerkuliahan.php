<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JurnalPerkuliahan extends Model
{
    use HasFactory;

    protected $table = 'jurnal_perkuliahan';
    protected $primaryKey = 'jurnal_id';

    protected $fillable = [
        'kelas_id',
        'pertemuan_ke',
        'tanggal_perkuliahan',
        'jam_mulai',
        'jam_selesai',
        'materi',
        'metode_pembelajaran',
        'validasi_dosen',
        'dosen_validator_id',
        'waktu_validasi_dosen',
        'validasi_mahasiswa',
        'mahasiswa_validator_id',
        'waktu_validasi_mahasiswa',
    ];

    protected $casts = [
        'validasi_dosen' => 'boolean',
        'validasi_mahasiswa' => 'boolean',
        'waktu_validasi_dosen' => 'datetime',
        'waktu_validasi_mahasiswa' => 'datetime',
    ];

    /**
     * Get the kelas that owns the jurnal.
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    /**
     * Get the absensi for the jurnal.
     */
    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class, 'jurnal_id');
    }

    /**
     * Get the dosen validator.
     */
    public function dosenValidator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dosen_validator_id', 'user_id');
    }

    /**
     * Get the mahasiswa validator.
     */
    public function mahasiswaValidator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mahasiswa_validator_id', 'user_id');
    }

    /**
     * Check if jurnal is fully validated (both dosen and mahasiswa).
     */
    public function isFullyValidated(): bool
    {
        return $this->validasi_dosen && $this->validasi_mahasiswa;
    }

    /**
     * Check if jurnal needs mahasiswa validation.
     */
    public function needsMahasiswaValidation(): bool
    {
        return $this->validasi_dosen && !$this->validasi_mahasiswa;
    }
}
