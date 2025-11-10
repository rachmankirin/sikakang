<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpadaSection extends Model
{
    use HasFactory;

    protected $table = 'spada_section';
    protected $primaryKey = 'section_id';
    protected $fillable = [
        'spada_course_id',
        'judul_section',
        'urutan',
        'deskripsi',
    ];

    /**
     * Get the course that owns the section.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(SpadaCourses::class, 'spada_course_id');
    }

    /**
     * Get the activities for the section.
     */
    public function activities(): HasMany
    {
        return $this->hasMany(SpadaActivities::class, 'section_id');
    }
}
