@extends('layouts.app')
@section('title', 'Tambah Informasi Kesehatan')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Tambah Informasi Kesehatan
    </div>
    <div class="card-body">
        <form action="{{ route('admin.informasi-kesehatan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="judul" class="form-label fw-semibold text-primary">Judul</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-semibold text-primary">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link_sumber" class="form-label fw-semibold text-primary">Link Informasi</label>
                <input type="url" name="link_sumber" class="form-control @error('link_sumber') is-invalid @enderror" id="link_sumber" value="{{ old('link_sumber') }}">
                @error('link_sumber')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_update" class="form-label fw-semibold text-primary">Tanggal Update</label>
                <input type="date" name="tanggal_update" class="form-control @error('tanggal_update') is-invalid @enderror" id="tanggal_update" value="{{ old('tanggal_update') }}" required>
                @error('tanggal_update')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('admin.informasi-kesehatan.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
