<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HelpdeskContent extends Model
{
    use HasFactory;

    protected $table = 'helpdesk_content';
    protected $primaryKey = 'content_id';

    protected $fillable = [
        'user_pembuat_id',
        'judul',
        'konten',
        'tipe_konten',
        'kategori',
        'view_count',
    ];

    /**
     * Get the user that created the content.
     */
    public function pembuat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_pembuat_id');
    }
}
