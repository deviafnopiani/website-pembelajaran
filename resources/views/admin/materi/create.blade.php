@extends('layouts.app')
@section('title', 'Tambah Materi Edukasi')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Tambah Materi Edukasi
    </div>
    <div class="card-body">
        <form action="{{ route('admin.materi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-3">
                <label for="judul" class="form-label fw-semibold text-primary">Judul</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                       value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kategori --}}
            <div class="mb-3">
                <label for="kategori" class="form-label fw-semibold text-primary">Kategori</label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="pola_hidup_sehat" {{ old('kategori') == 'pola_hidup_sehat' ? 'selected' : '' }}>Pola Hidup Sehat</option>
                    <option value="reproduksi" {{ old('kategori') == 'reproduksi' ? 'selected' : '' }}>Reproduksi</option>
                    <option value="kesehatan_mental" {{ old('kategori') == 'kesehatan_mental' ? 'selected' : '' }}>Kesehatan Mental</option>
                    <option value="gizi" {{ old('kategori') == 'gizi' ? 'selected' : '' }}>Gizi</option>
                    <option value="narkoba" {{ old('kategori') == 'narkoba' ? 'selected' : '' }}>Narkoba</option>

 
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-semibold text-primary">Deskripsi</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                          rows="4">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Jenis --}}
            <div class="mb-3">
                <label for="jenis" class="form-label fw-semibold text-primary">Tipe Media</label>
                <select name="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
                    <option value="">-- Pilih Tipe Media --</option>
                    <option value="pdf" {{ old('jenis') == 'pdf' ? 'selected' : '' }}>PDF</option>
                    <option value="doc" {{ old('jenis') == 'doc' ? 'selected' : '' }}>DOC</option>
                    <option value="video" {{ old('jenis') == 'video' ? 'selected' : '' }}>Video</option>
                    <option value="link" {{ old('jenis') == 'link' ? 'selected' : '' }}>Link</option>
                </select>
                @error('jenis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- File Upload --}}
            <div class="mb-3">
                <label for="file" class="form-label fw-semibold text-primary">Upload File</label>
                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                <small class="text-muted">File yang didukung: pdf, doc, mp4</small>
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Link --}}
            <div class="mb-3">
                <label for="link" class="form-label fw-semibold text-primary">Link (jika tipe media adalah link)</label>
                <input type="url" name="link" class="form-control @error('link') is-invalid @enderror"
                       value="{{ old('link') }}">
                @error('link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tombol --}}
            <a href="{{ route('admin.materi.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Materi</button>
        </form>
    </div>
</div>
@endsection
