<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DosenDetail extends Model
{
    use HasFactory;

    protected $table = 'dosen_details';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = [
        'nidn',
        'jabatan_fungsional',
        'bidang_keahlian',
    ];

    /**
     * Get the user that owns the detail.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
