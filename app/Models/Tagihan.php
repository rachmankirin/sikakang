<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihan';
    protected $primaryKey = 'tagihan_id';

    protected $fillable = [
        'mahasiswa_user_id',
        'jenis_tagihan',
        'jumlah_tagihan',
        'status_pembayaran',
        'tanggal_jatuh_tempo',
        'tanggal_pembayaran',
        'semester',
    ];

    /**
     * Get the mahasiswa that owns the tagihan.
     */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mahasiswa_user_id');
    }
}
