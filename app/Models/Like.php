<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'materi_id',
        'user_id',
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
