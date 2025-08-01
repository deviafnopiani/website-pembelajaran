@extends('layouts.app')
@section('title', 'Detail Zoom Meeting')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Zoom Meeting
    </div>
    <div class="card-body">
        <h4 class="fw-bold text-primary">{{ $zoomRoom->judul }}</h4>

        <p><strong>Jadwal:</strong> {{ \Carbon\Carbon::parse($zoomRoom->jadwal)->format('d M Y - H:i') }}</p>
        <p><strong>ID Meeting:</strong> {{ $zoomRoom->meeting_id }}</p>
        <p><strong>Passcode:</strong> {{ $zoomRoom->passcode }}</p>

        <div class="mt-3">
            <p class="text-muted">
                Klik tombol di bawah untuk bergabung.
            </p>
            <a href="zoommtg://zoom.us/join?confno={{ $zoomRoom->meeting_id }}&pwd={{ $zoomRoom->passcode }}"
               class="btn btn-outline-primary btn-sm mb-2">
                Buka di Aplikasi Zoom
            </a>

            <div class="mt-2">
                <small class="text-muted">Atau salin link Zoom:</small>
                <div class="input-group">
                    <input type="text" value="{{ $zoomRoom->link_meeting }}" class="form-control" readonly>
                    <button class="btn btn-outline-secondary" onclick="navigator.clipboard.writeText('{{ $zoomRoom->link_meeting }}')">Salin</button>
                </div>
            </div>
        </div>

        <a href="{{ route('user.zoom-rooms.index') }}" class="btn btn-secondary mt-4">Kembali</a>
    </div>
</div>
@endsection
