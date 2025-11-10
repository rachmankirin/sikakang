<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpadaActivities extends Model
{
    use HasFactory;

    protected $table = 'spada_activities';
    protected $primaryKey = 'activity_id';
    protected $fillable = [
        'section_id',
        'judul_activity',
        'tipe_activity',
        'instruksi',
        'due_date',
        'bobot_nilai',
        'is_active',
    ];

    /**
     * Get the section that owns the activity.
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(SpadaSection::class, 'section_id');
    }

    /**
     * Get the submissions for the activity.
     */
    public function submissions(): HasMany
    {
        return $this->hasMany(SpadaSubmission::class, 'activity_id');
    }
}
