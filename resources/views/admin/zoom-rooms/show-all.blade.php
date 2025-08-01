@extends('layouts.app')
@section('title', 'Semua Zoom Meeting')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Semua Zoom Meeting
    </div>
    <div class="card-body">
        @if($zooms->isEmpty())
            <p class="text-muted">Belum ada Zoom Meeting dibuat.</p>
        @else
            @foreach($zooms as $zoom)
                <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                    <h5 class="fw-bold text-primary">{{ $zoom->judul }}</h5>
                    <p>{{ $zoom->deskripsi }}</p>
                    <p><strong>Jadwal:</strong> {{ \Carbon\Carbon::parse($zoom->jadwal)->format('d-m-Y H:i') }}</p>
                    <p><strong>Link Meeting:</strong>
                        <a href="{{ $zoom->link_meeting }}" target="_blank">{{ $zoom->link_meeting }}</a>
                    </p>
                </div>
            @endforeach
        @endif
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>

    </div>
</div>
@endsection
