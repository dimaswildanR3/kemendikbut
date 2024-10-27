<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'users_id');
    }

    // Relasi ke model Berita
    public function beritas()
    {
        return $this->hasMany(Berita::class, 'users_id');
    }

    // Relasi ke model Dokumen
    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'users_id');
    }

    // Relasi ke model Gambar
    public function gambars()
    {
        return $this->hasMany(Gambar::class, 'users_id');
    }

    // Relasi ke model Video
    public function videos()
    {
        return $this->hasMany(Video::class, 'users_id');
    }
}
