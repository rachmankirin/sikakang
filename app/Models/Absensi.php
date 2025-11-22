<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';
    protected $primaryKey = 'absensi_id';
    protected $fillable = [
        'jurnal_id',
        'mahasiswa_user_id',
        'status_kehadiran',
        'waktu_absen',
        'keterangan',
    ];

    /**
     * Get the jurnal perkuliahan that owns the absensi.
     */
    public function jurnal()
    {
        return $this->belongsTo(JurnalPerkuliahan::class, 'jurnal_id', 'jurnal_id');
    }

    /**
     * Get the mahasiswa that owns the absensi.
     */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mahasiswa_user_id');
    }
}
