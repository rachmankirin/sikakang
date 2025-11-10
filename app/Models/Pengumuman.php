<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';
    protected $primaryKey = 'pengumuman_id';

    protected $fillable = [
        'user_pembuat_id',
        'judul',
        'konten',
        'tanggal_publish',
        'tanggal_berakhir',
        'is_active',
        'prioritas',
    ];

    /**
     * Get the user that created the pengumuman.
     */
    public function pembuat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_pembuat_id');
    }
}
