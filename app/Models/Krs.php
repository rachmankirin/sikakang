<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs';
    protected $primaryKey = 'krs_id';

    /**
     * Get the user that owns the krs.
     */
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_user_id');
    }

    /**
     * Get the kelas that owns the krs.
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
