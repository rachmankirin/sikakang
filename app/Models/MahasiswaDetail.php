<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaDetail extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_details';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nim',
        'dosen_pa_id',
        'angkatan',
        'program_studi',
        'status_mahasiswa',
    ];

    /**
     * Get the user that owns the detail.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the dosen PA for the mahasiswa.
     */
    public function dosenPa()
    {
        return $this->belongsTo(User::class, 'dosen_pa_id');
    }
}
