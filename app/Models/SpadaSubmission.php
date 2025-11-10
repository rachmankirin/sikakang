<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpadaSubmission extends Model
{
    use HasFactory;

    protected $table = 'spada_submission';
    protected $primaryKey = 'submission_id';
    protected $fillable = [
        'activity_id',
        'mahasiswa_user_id',
        'nilai',
        'file_path',
        'waktu_submit',
        'feedback',
    ];

    /**
     * Get the activity that owns the submission.
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(SpadaActivities::class, 'activity_id');
    }

    /**
     * Get the mahasiswa that owns the submission.
     */
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mahasiswa_user_id');
    }
}
