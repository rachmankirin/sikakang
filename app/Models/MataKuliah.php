<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $primaryKey = 'mk_id';
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'deskripsi',
    ];

    /**
     * Get the kelas for the mata kuliah.
     */
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'mk_id');
    }
}
