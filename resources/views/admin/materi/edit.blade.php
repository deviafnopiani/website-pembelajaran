@extends('layouts.app')
@section('title', 'Edit Materi Edukasi')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Edit Materi Edukasi
    </div>
    <div class="card-body">
        <form action="{{ route('admin.materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-3">
                <label for="judul" class="form-label fw-semibold text-primary">Judul</label>
                <input type="text" name="judul" id="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul', $materi->judul) }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kategori --}}
            <div class="mb-3">
                <label for="kategori" class="form-label fw-semibold text-primary">Kategori</label>
                <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="pola_hidup_sehat" {{ $materi->kategori == 'pola_hidup_sehat' ? 'selected' : '' }}>Pola Hidup Sehat</option>
                    <option value="reproduksi" {{ $materi->kategori == 'reproduksi' ? 'selected' : '' }}>Reproduksi</option>
                    <option value="kesehatan_mental" {{ $materi->kategori == 'kesehatan_mental' ? 'selected' : '' }}>Kesehatan Mental</option>
                    <option value="gizi" {{ $materi->kategori == 'gizi' ? 'selected' : '' }}>Gizi</option>
                    <option value="narkoba" {{ $materi->kategori == 'narkoba' ? 'selected' : '' }}>Narkoba</option>
               </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-semibold text-primary">Deskripsi</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                          rows="4">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tipe --}}
            <div class="mb-3">
                <label for="tipe" class="form-label fw-semibold text-primary">Tipe Materi</label>
                <select name="tipe" id="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                    <option value="pdf" {{ $materi->tipe == 'pdf' ? 'selected' : '' }}>PDF</option>
                    <option value="doc" {{ $materi->tipe == 'doc' ? 'selected' : '' }}>DOC</option>
                    <option value="video" {{ $materi->tipe == 'video' ? 'selected' : '' }}>Video</option>
                    <option value="link" {{ $materi->tipe == 'link' ? 'selected' : '' }}>Link</option>
                </select>
                @error('tipe')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file" class="form-label fw-semibold text-primary">Upload File</label>
                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                <small class="text-muted">File yang didukung: pdf, doc, mp4</small>
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- File / Link --}}
            <div class="mb-3">
                <label for="file" class="form-label fw-semibold text-primary">File atau Link</label>
                <input type="text" name="file" id="file"
                    class="form-control @error('file') is-invalid @enderror"
                    value="{{ old('file', $materi->file) }}" required>
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tombol --}}
            <a href="{{ route('admin.materi.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
