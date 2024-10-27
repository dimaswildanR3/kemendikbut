<?php

// app/Models/Agenda.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';

    protected $fillable = [
        'judul',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'kategori_id',
        'users_id',
    ];
    

    public function kategori()
    {
        return $this->belongsTo(KategoriAgenda::class, 'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}