<?php

// app/Models/KategoriAgenda.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAgenda extends Model
{
    use HasFactory;

    protected $table = 'kategori_agenda';

    protected $fillable = [
        'nama_kategori',
    ];

    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'kategori_id');
    }
}