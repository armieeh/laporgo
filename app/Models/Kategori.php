<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';

    protected $fillable = ['kategori'];

    public $timestamps = false;


    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id');
    }
}
