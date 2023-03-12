<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as  Authenticatable;


class Petugas extends Authenticatable
{
    use HasFactory;

    protected $table = 'petugas';

    protected $primaryKey = 'id_petugas';

    protected $fillable = [
        'nama',
        'username',
        'password',
        'telp',
        'id_desa',
        'level'
    ];

    public $timestamps = false;

    public function tanggapan()
    {
        return $this->belongsTo(Tanggapan::class, 'id_petugas');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id_desa');
    }
}
