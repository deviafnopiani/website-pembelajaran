@extends('layouts.app')

@section('title', 'Buat Zoom Meeting')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Buat Zoom Meeting
    </div>
    <div class="card-body">
        <form action="{{ route('admin.zoom-rooms.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Meeting</label>
                <input type="text" name="judul" id="judul" class="form-control" required value="{{ old('judul') }}">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi (opsional)</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="jadwal" class="form-label">Jadwal Mulai</label>
                <input type="datetime-local" name="jadwal" id="jadwal" class="form-control" required value="{{ old('jadwal') }}">
            </div>

            <button type="submit" class="btn btn-success">Buat Meeting</button>
            <a href="{{ route('admin.zoom-rooms.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
