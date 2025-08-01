<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'link_meeting',
        'jadwal',
        'created_by',
        'meeting_id',
        'passcode',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
