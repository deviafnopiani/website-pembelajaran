@extends('layouts.app')
@section('title', 'Informasi Kesehatan User')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Informasi Kesehatan
    </div>
    <div class="card-body">
        @if($infos->isEmpty())
            <p class="text-muted">Belum ada informasi ditambahkan.</p>
        @else
            @foreach($infos as $info)
                <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                    <h5 class="fw-bold text-primary">{{ $info->judul }}</h5>
                    <p>{{ $info->deskripsi }}</p>
                    <p><strong>Tanggal Update:</strong> {{ \Carbon\Carbon::parse($info->tanggal_update)->format('d-m-Y') }}</p>
                    <p><strong>Link:</strong> <a href="{{ $info->link_sumber }}" target="_blank">{{ $info->link_sumber }}</a></p>
                </div>
            @endforeach
        @endif
        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary mt-3">Kembali</a>

    </div>
</div>
@endsection
