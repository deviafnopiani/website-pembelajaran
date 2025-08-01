@extends('layouts.app')
@section('title', 'Materi Edukasi')

@section('content')
<!-- <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
        Materi Edukasi

        <form method="GET" action="{{ route('user.materi.index') }}" class="mb-3 d-flex justify-content-end">
                <select name="kategori" onchange="this.form.submit()" class="form-select w-auto">
                    <option value="">-- Semua Kategori --</option>
                    <option value="pola_hidup_sehat" {{ request('kategori') == 'pola_hidup_sehat' ? 'selected' : '' }}>Pola Hidup Sehat</option>
                    <option value="reproduksi" {{ request('kategori') == 'reproduksi' ? 'selected' : '' }}>Reproduksi</option>
                    <option value="kesehatan_mental" {{ request('kategori') == 'kesehatan_mental' ? 'selected' : '' }}>Kesehatan Mental</option>
                    <option value="gizi" {{ request('kategori') == 'gizi' ? 'selected' : '' }}>Gizi</option>
                    <option value="narkoba" {{ request('kategori') == 'narkoba' ? 'selected' : '' }}>Narkoba</option>
                </select>
    </div> -->
    <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white rounded-top-4">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0">Materi Edukasi</h5>
            <form method="GET" action="{{ route('user.materi.index') }}">
                <select name="kategori" onchange="this.form.submit()" class="form-select form-select-sm">
                    <option value="">-- Semua Kategori --</option>
                    <option value="pola_hidup_sehat" {{ request('kategori') == 'pola_hidup_sehat' ? 'selected' : '' }}>Pola Hidup Sehat</option>
                    <option value="reproduksi" {{ request('kategori') == 'reproduksi' ? 'selected' : '' }}>Reproduksi</option>
                    <option value="kesehatan_mental" {{ request('kategori') == 'kesehatan_mental' ? 'selected' : '' }}>Kesehatan Mental</option>
                    <option value="gizi" {{ request('kategori') == 'gizi' ? 'selected' : '' }}>Gizi</option>
                    <option value="narkoba" {{ request('kategori') == 'narkoba' ? 'selected' : '' }}>Narkoba</option>
                </select>
            </form>
        </div>
    </div>
    <div class="card-body">
        @if($materis->isEmpty())
            <p class="text-muted">Belum ada materi yang tersedia.</p>
        @else
            @foreach($materis as $materi)
                <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                    <h5 class="fw-bold text-primary">{{ $materi->judul }}</h5>
                    <p><strong>Kategori:</strong> {{ ucfirst(str_replace('_', ' ', $materi->kategori)) }}</p>
                    <p><strong>Tipe:</strong> {{ strtoupper($materi->jenis) }}</p>
                    <p>{{ $materi->deskripsi }}</p>
            </form>


                    {{-- Tampilkan media --}}
                    @if($materi->jenis === 'link')
                        <a href="{{ $materi->link }}" target="_blank" class="btn btn-sm btn-outline-primary">Buka Link</a>
                    @elseif(in_array($materi->jenis, ['pdf', 'doc', 'video']))
                        @if($materi->jenis === 'video')
                            <video controls width="100%">
                                <source src="{{ asset('storage/' . $materi->file_path) }}" type="video/mp4">
                                Browser Anda tidak mendukung video.
                            </video>
                        @else
                            <a href="{{ asset('storage/' . $materi->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">📥 Unduh {{ strtoupper($materi->jenis) }}</a>
                        @endif
                    @endif

                    {{-- Komentar dan Like --}}
                    <div class="mt-3 d-flex align-items-center gap-3">
                        <form action="{{ route('user.materi.like.toggle', $materi->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                ❤️ Suka ({{ $materi->likes_count ?? 0 }})
                            </button>
                             <!-- <button class="btn btn-outline-primary btn-sm" disabled>
                                💬 Komentar ({{ $materi->komentar_count ?? 0 }})
                            </button> -->
                        </form>

                        <a href="{{ route('user.materi.show', $materi->id) }}" class="btn btn-outline-primary btn-sm">
                            💬 Komentar ({{ $materi->komentar_count ?? 0 }})
                        </a>
                    </div>

                    <p class="mt-2"><small class="text-muted">Diunggah pada {{ $materi->created_at->format('d-m-Y') }}</small></p>
                </div>
            @endforeach
        @endif
                <a href="{{ route('user.dashboard') }}" class="btn btn-secondary mt-4">Kembali</a>

    </div>
    
</div>
@endsection
