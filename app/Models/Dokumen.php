<?php

// app/Models/Dokumen.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';

    protected $fillable = [
        'judul',
        'url',
        'kategori_id',
        'users_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriDokumen::class, 'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}