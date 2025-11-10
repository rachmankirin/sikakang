<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the krs for the user.
     */
    public function krs(): HasMany
    {
        return $this->hasMany(Krs::class, 'mahasiswa_user_id');
    }

    /**
     * Get the mahasiswa detail associated with the user.
     */
    public function mahasiswaDetail(): HasOne
    {
        return $this->hasOne(MahasiswaDetail::class, 'user_id');
    }

    /**
     * Get the dosen detail associated with the user.
     */
    public function dosenDetail(): HasOne
    {
        return $this->hasOne(DosenDetail::class, 'user_id');
    }

    /**
     * Get the pengumuman created by the user.
     */
    public function pengumuman(): HasMany
    {
        return $this->hasMany(Pengumuman::class, 'user_pembuat_id');
    }

    /**
     * Get the helpdesk content created by the user.
     */
    public function helpdeskContent(): HasMany
    {
        return $this->hasMany(HelpdeskContent::class, 'user_pembuat_id');
    }

    /**
     * Get the kelas where the user is the dosen pengampu.
     */
    public function kelasMengampu(): HasMany
    {
        return $this->hasMany(Kelas::class, 'dosen_pengampu_id');
    }

    /**
     * Get the pengajuan surat for the user (as mahasiswa).
     */
    public function pengajuanSuratMahasiswa(): HasMany
    {
        return $this->hasMany(PengajuanSurat::class, 'mahasiswa_user_id');
    }

    /**
     * Get the pengajuan surat for the user (as dosen PA).
     */
    public function pengajuanSuratDosenPa(): HasMany
    {
        return $this->hasMany(PengajuanSurat::class, 'dosen_pa_id');
    }

    /**
     * Get the tagihan for the user.
     */
    public function tagihan(): HasMany
    {
        return $this->hasMany(Tagihan::class, 'mahasiswa_user_id');
    }

    /**
     * Get the absensi for the user.
     */
    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class, 'mahasiswa_user_id');
    }

    /**
     * Get the spada submissions for the user.
     */
    public function spadaSubmissions(): HasMany
    {
        return $this->hasMany(SpadaSubmission::class, 'mahasiswa_user_id');
    }
}
