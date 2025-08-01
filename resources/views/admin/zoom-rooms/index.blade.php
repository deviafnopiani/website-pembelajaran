@extends('layouts.app')

@section('title', 'Daftar Zoom Meeting')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Daftar Zoom Meeting
    </div>
    <div class="card-body">
        <a href="{{ route('admin.zoom-rooms.create') }}" class="btn btn-primary mb-3">+ Buat Zoom Meeting</a>
        <a href="{{ route('admin.zoom-rooms.semua') }}" class="btn btn-primary mb-3">Lihat Semua Zoom</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali</a>



        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($zoomRooms->isEmpty())
            <p class="text-muted">Belum ada Zoom meeting dibuat.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Link</th>
                            <th>Jadwal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($zoomRooms as $zoom)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $zoom->judul }}</td>
                            <td>{{ $zoom->deskripsi ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ $zoom->link_meeting }}" target="_blank" class="btn btn-sm btn-outline-primary">Join</a>
                            </td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($zoom->jadwal)->format('d-m-Y H:i') }}</td>
                            <td class="text-center">
                                <form action="{{ route('admin.zoom-rooms.destroy', $zoom->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus meeting ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $zoomRooms->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
