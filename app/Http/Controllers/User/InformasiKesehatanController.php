<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\InformasiKesehatan;
use Illuminate\Http\Request;

class InformasiKesehatanController extends Controller
{
    public function index()
    {
        $infos = InformasiKesehatan::orderByDesc('created_at')->paginate(10);
        return view('user.informasi-kesehatan.index', compact('infos'));
    }

    public function show(InformasiKesehatan $informasiKesehatan)
    {
        return view('user.informasi-kesehatan.show', compact('informasiKesehatan'));
    }
}
