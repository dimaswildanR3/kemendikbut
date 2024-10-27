<?php

// app/Models/Gambar.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    use HasFactory;

    protected $table = 'gambar';

    protected $fillable = [
        'url',
        'kategori_id',
        'users_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriGambar::class, 'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}