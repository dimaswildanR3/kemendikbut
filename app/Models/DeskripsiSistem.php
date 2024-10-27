<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskripsiSistem extends Model
{
    use HasFactory;

    protected $table = 'deskripsi_sistem';

    protected $fillable = [
        'nama',
        'alias',
        'deskripsi',
        'tahun',
        'nama_organisasi',
        'logo_frontend',
        'logo_backend',
    ];
}