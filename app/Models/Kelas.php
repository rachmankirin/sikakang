<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'kelas_id';
    protected $fillable = [
        'mk_id',
        'dosen_pengampu_id',
        'nama_kelas',
        'tahun_ajar',
        'semester',
        'kapasitas',
        'jam_mulai',
        'jam_selesai',
        'hari',
    ];

    /**
     * Get the krs for the kelas.
     */
    public function krs(): HasMany
    {
        return $this->hasMany(Krs::class, 'kelas_id');
    }

    /**
     * Get the mata kuliah for the kelas.
     */
    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'mk_id');
    }

    /**
     * Get the dosen pengampu for the kelas.
     */
    public function dosenPengampu(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dosen_pengampu_id');
    }

    /**
     * Get the jurnal perkuliahan for the kelas.
     */
    public function jurnalPerkuliahan(): HasMany
    {
        return $this->hasMany(JurnalPerkuliahan::class, 'kelas_id');
    }

    /**
     * Get the spada courses for the kelas.
     */
    public function spadaCourses(): HasMany
    {
        return $this->hasMany(SpadaCourses::class, 'kelas_id');
    }
}
