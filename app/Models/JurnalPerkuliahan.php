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
}
