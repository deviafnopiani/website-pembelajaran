<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'jenis',
        'file_path',
        'link',
    ];

    // Relasi ke komentar (dengan user)
    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    // Relasi ke like
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
