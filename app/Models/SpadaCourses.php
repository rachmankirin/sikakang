<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpadaCourses extends Model
{
    use HasFactory;

    protected $table = 'spada_courses';
    protected $primaryKey = 'spada_course_id';
    protected $fillable = [
        'kelas_id',
        'kode_course',
        'deskripsi',
        'file_path',
    ];

    /**
     * Get the kelas that owns the course.
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    /**
     * Get the sections for the course.
     */
    public function sections(): HasMany
    {
        return $this->hasMany(SpadaSection::class, 'spada_course_id');
    }
}
