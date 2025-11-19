<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    protected $fillable = [
        'name',
        'fakultas_id',
        'code'
    ];

    public function fakultas()
    {
        return $this->hasOne(Fakultas::class, 'id');
    }
}
