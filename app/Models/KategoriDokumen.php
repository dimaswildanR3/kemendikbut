<?php

// app/Models/KategoriDokumen.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDokumen extends Model
{
    use HasFactory;

    protected $table = 'kategori_dokumen';

    protected $fillable = [
        'nama_kategori',
        'users_id',
    ];

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'kategori_id');
    }

 public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}