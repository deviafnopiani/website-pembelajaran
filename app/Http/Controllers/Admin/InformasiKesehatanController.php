<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InformasiKesehatan;
use Illuminate\Support\Facades\Auth;

class InformasiKesehatanController extends Controller
{
    public function index()
    {
        $infos = InformasiKesehatan::orderByDesc('created_at')->paginate(15);
        return view('admin.informasi-kesehatan.index', compact('infos'));
    }

    public function create()
    {
        return view('admin.informasi-kesehatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'link_sumber' => 'nullable|url|max:500',
        'tanggal_update' => 'required|date',
        ]);

        InformasiKesehatan::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'link_sumber' => $request->link_sumber,
        'tanggal_update' => $request->tanggal_update,
        'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.informasi-kesehatan.index')->with('success', 'Informasi berhasil disimpan.');
    }

    public function edit(InformasiKesehatan $informasiKesehatan)
    {
        return view('admin.informasi-kesehatan.edit', compact('informasiKesehatan'));
    }

    public function update(Request $request, InformasiKesehatan $informasiKesehatan)
    {
        $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'link_sumber' => 'nullable|url|max:500',
        'tanggal_update' => 'required|date',
        ]);

        $informasiKesehatan->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'link_sumber' => $request->link_sumber,
        'tanggal_update' => $request->tanggal_update,
        ]);

        return redirect()->route('admin.informasi-kesehatan.index')->with('success', 'Informasi berhasil diperbarui.');
    }
    public function show(InformasiKesehatan $informasiKesehatan)
    {
        return view('admin.informasi-kesehatan.show', compact('informasiKesehatan'));
    }

    public function showAll()
    {
    $infos = InformasiKesehatan::orderByDesc('created_at')->get();
    return view('admin.informasi-kesehatan.show-all', compact('infos'));
    }

    public function destroy(InformasiKesehatan $informasiKesehatan)
    {
        $informasiKesehatan->delete();

        return redirect()->route('admin.informasi-kesehatan.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
