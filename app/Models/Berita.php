<?php

// app/Models/Berita.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'isi',
        'isi_p',
        'tanggal',
        'kategori_id',
        'kategori_nama',
        'views',
        'gambar',
        'pengguna_id',
        'author',
        'img_slider',
    ];

    protected $casts = [
        'tanggal' => 'date', // atau 'datetime' jika termasuk waktu
    ];
    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}