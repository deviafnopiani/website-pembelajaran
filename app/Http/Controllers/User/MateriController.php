<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        $query = Materi::withCount(['komentar', 'likes']);

        // filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // daftar materi terbaru
        $materis = $query->orderByDesc('created_at')->paginate(50);

        // dropdown
        $kategoriList = Materi::select('kategori')->distinct()->pluck('kategori');

        return view('user.materi.index', compact('materis', 'kategoriList'));
    }


    public function show(Materi $materi)
    {
        $materi->load(['komentar.user', 'likes'])->loadCount('komentar');

        return view('user.materi.show', compact('materi'));
    }
}
