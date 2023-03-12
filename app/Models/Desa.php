<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';

    protected $fillable = [
        'id_desa',
        'nama_desa'
    ];

    public function petugas()
    {
        return $this->hasOne(Petugas::class, 'id_petugas', 'id_petugas');
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id_desa', 'id_desa');
    }
}
