@extends('layouts.app')
@section('title', 'Zoom Meeting')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Jadwal Zoom Meeting
    </div>
    <div class="card-body">
        @if($zoomRooms->isEmpty())
            <p class="text-muted">Belum ada jadwal Zoom yang tersedia.</p>
        @else
            @foreach($zoomRooms as $room)
                <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                    <h5 class="fw-bold text-primary">{{ $room->judul }}</h5>
                    <p><strong>Jadwal:</strong> {{ \Carbon\Carbon::parse($room->jadwal)->format('d M Y - H:i') }}</p>
                    <a href="{{ route('user.zoom-rooms.show', $room->id) }}" class="btn btn-sm btn-outline-primary">
                        Lihat Detail
                    </a>
                </div>
            @endforeach

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $zoomRooms->links() }}
            </div>
        @endif
            <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>

    </div>
</div>

@endsection
