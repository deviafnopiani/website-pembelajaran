@extends('layouts.app')
@section('title', 'Detail Informasi Kesehatan')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Detail Informasi Kesehatan
    </div>
    <div class="card-body">
        <h4 class="fw-bold text-primary">{{ $informasiKesehatan->judul }}</h4>
        <p><strong>Deskripsi:</strong><br>{{ $informasiKesehatan->deskripsi }}</p>
        @if($informasiKesehatan->link_sumber)
            <p><strong>Link Sumber:</strong> <a href="{{ $informasiKesehatan->link_sumber }}" target="_blank">{{ $informasiKesehatan->link_sumber }}</a></p>
        @endif
        <p><strong>Tanggal Update:</strong> {{ \Carbon\Carbon::parse($informasiKesehatan->tanggal_update)->format('d M Y') }}</p>
        <a href="{{ route('admin.informasi-kesehatan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
