@extends('layouts.app')
@section('title', 'Detail Materi')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Detail Materi Edukasi
    </div>
    <div class="card-body">
        <h4 class="fw-bold text-primary">{{ $materi->judul }}</h4>
        <p><strong>Kategori:</strong> {{ ucfirst(str_replace('_', ' ', $materi->kategori)) }}</p>
        <p><strong>Tipe Media:</strong> {{ strtoupper($materi->jenis) }}</p>
        <p><strong>Deskripsi:</strong><br>{{ $materi->deskripsi }}</p>

        {{-- Tampilkan Media --}}
        @if($materi->jenis === 'link')
            <a href="{{ $materi->link }}" target="_blank" class="btn btn-outline-info btn-sm">🔗 Buka Link</a>
        @elseif(in_array($materi->jenis, ['pdf', 'doc', 'video']))
            @if($materi->jenis === 'video')
                <video controls width="100%" class="mt-3">
                    <source src="{{ asset('storage/' . $materi->file_path) }}" type="video/mp4">
                    Browser tidak mendukung video.
                </video>
            @else
                <a href="{{ asset('storage/' . $materi->file_path) }}" target="_blank" class="btn btn-outline-primary btn-sm mt-2">
                    📥 Unduh {{ strtoupper($materi->jenis) }}
                </a>
            @endif
        @endif

        <hr class="my-4">

        {{-- Like dan Komentar (Read-Only untuk Admin) --}}
        <div class="mt-3 d-flex align-items-center gap-3">
            <button class="btn btn-outline-danger btn-sm" disabled>
                ❤️ Suka ({{ $materi->likes_count ?? 0 }})
            </button>

            <button class="btn btn-outline-primary btn-sm" disabled>
                💬 Komentar ({{ $materi->komentar_count ?? 0 }})
            </button>
        </div>

        {{-- Komentar Detail --}}
        <h5 class="text-primary fw-bold mt-4">Komentar Pengguna</h5>
        @if ($materi->komentar->count())
            @foreach ($materi->komentar as $komentar)
                <div class="border rounded p-2 mb-3 bg-light">
                    <div class="d-flex justify-content-between">
                        <strong>{{ $komentar->user->name }}</strong>
                        <small class="text-muted">{{ $komentar->created_at->format('d M Y H:i') }}</small>
                    </div>
                    <p class="mb-2">{{ $komentar->isi_komentar }}</p>

                    {{-- Jika sudah ada balasan --}}
                    @if ($komentar->balasan_admin)
                        <div class="mt-2 ms-3 ps-3 border-start border-3 border-primary bg-white rounded">
                        <strong class="text-primary">Admin</strong> 
                        <p class="mb-0">{{ $komentar->balasan_admin }}</p>
                        </div>
                    @endif

                    {{-- Form Balasan Admin --}}
                    <form action="{{ route('admin.komentar.balas', $komentar->id) }}" method="POST" class="mt-2">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input type="text" name="balasan_admin" class="form-control" placeholder="Balas komentar..." required>
                            <button class="btn btn-primary" type="submit">Balas</button>
                        </div>
                    </form>
                </div>
            @endforeach
        @else
            <p class="text-muted">Belum ada komentar dari pengguna.</p>
        @endif

        <a href="{{ route('admin.materi.semua') }}" class="btn btn-secondary mt-4">Kembali</a>
    </div>
</div>
@endsection
