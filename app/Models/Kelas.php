<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'kelas_id';

    /**
     * Get the krs for the kelas.
     */
    public function krs()
    {
        return $this->hasMany(Krs::class, 'kelas_id');
    }
}
