@extends('layouts.app')
@section('title', 'Daftar Materi Edukasi')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Daftar Materi Edukasi
    </div>
    <div class="card-body">
        <a href="{{ route('admin.materi.create') }}" class="btn btn-primary mb-3">+ Tambah Materi</a>
        <a href="{{ route('admin.materi.semua') }}" class="btn btn-primary mb-3">Lihat Semua</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($materis->isEmpty())
            <p class="text-muted">Belum ada materi yang ditambahkan.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-success text-center">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tipe Media</th>
                            <th>Diunggah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materis as $materi)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $materi->judul }}</td>
                                <td class="text-center">{{ ucfirst(str_replace('_', ' ', $materi->kategori)) }}</td>
                                <td class="text-center">{{ strtoupper($materi->jenis) }}</td>
                                <td class="text-center">{{ $materi->created_at->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.materi.edit', $materi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.materi.destroy', $materi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $materis->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
