<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
     public function store(Request $request, Materi $materi)
    {
        $request->validate([
            'isi_komentar' => 'required|string|max:1000',
        ]);
        Komentar::create([
            'materi_id' => $materi->id,
            'user_id' => Auth::id(),
            'isi_komentar' => $request->isi_komentar,
        ]);
        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
    public function balas(Request $request, Komentar $komentar)
    {
    $request->validate([
        'balasan_admin' => 'required|string|max:1000',
    ]);

    $komentar->update([
        'balasan_admin' => $request->balasan_admin,
    ]);

    return back()->with('success', 'Balasan berhasil dikirim.');   
    }
}
