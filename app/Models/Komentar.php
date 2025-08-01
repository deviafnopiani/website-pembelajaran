<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    // 
    use HasFactory;
    protected $fillable = [
        'materi_id',
        'user_id',
        'isi_komentar',
        'balasan_admin'
    ];
    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
