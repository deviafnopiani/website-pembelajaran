@extends('layouts.app')
@section('title', $materi->judul)

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        {{ $materi->judul }}
    </div>
    <div class="card-body">

        <p><strong>Kategori:</strong> {{ ucfirst(str_replace('_', ' ', $materi->kategori)) }}</p>
        <p><strong>Tipe:</strong> {{ strtoupper($materi->jenis) }}</p>
        <p>{{ $materi->deskripsi }}</p>

        {{-- Media --}}
        @if($materi->jenis === 'link')
            <a href="{{ $materi->link }}" target="_blank" class="btn btn-outline-info">Buka Link</a>
        @elseif(in_array($materi->jenis, ['pdf', 'doc', 'video']))
            @if($materi->jenis === 'video')
                <video controls width="100%">
                    <source src="{{ asset('storage/' . $materi->file_path) }}" type="video/mp4">
                </video>
            @else
                <a href="{{ asset('storage/' . $materi->file_path) }}" target="_blank" class="btn btn-outline-primary">
                   📥 Unduh {{ strtoupper($materi->jenis) }}
                </a>
            @endif
        @endif

        {{-- Like --}}
        <form action="{{ route('user.materi.like.toggle', $materi->id) }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">
                ❤️ Suka ({{ $materi->likes->count() }})
            </button>
            <button class="btn btn-outline-primary btn-sm">
                💬 Komentar ({{ $materi->komentar_count ?? 0 }})
            </button>
                            
        </form>

        {{-- Komentar --}}
        <div class="mt-4">
            <h6>Komentar</h6>
            <form method="POST" action="{{ route('user.materi.komentar.store', $materi->id) }}">
                @csrf
                <div class="mb-3">
                    <textarea name="isi_komentar" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Kirim Komentar</button>
            </form>

            <hr>
            @forelse($materi->komentar as $komen)
                <div class="mb-2">
                    <strong>{{ $komen->user->name }}</strong> 
                    <small class="text-muted">{{ $komen->created_at->diffForHumans() }}</small>
                    <p>{{ $komen->isi_komentar }}</p>

                     {{-- Tampilkan balasan admin jika ada --}}
                    @if($komen->balasan_admin)
                        <div class="mt-2 ms-3 ps-3 border-start border-3 border-primary bg-white rounded">
                            <strong class="text-primary">Admin</strong>
                            <p class="mb-0">{{ $komen->balasan_admin }}</p>
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-muted">Belum ada komentar.</p>
            @endforelse
        </div>

        <a href="{{ route('user.materi.index') }}" class="btn btn-secondary mt-4">Kembali</a>
    </div>
</div>
@endsection
