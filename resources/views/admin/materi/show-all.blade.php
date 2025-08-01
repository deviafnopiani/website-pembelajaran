@extends('layouts.app')
@section('title', 'Semua Materi Edukasi')

@section('content')
<div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white rounded-top-4">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0">Materi Edukasi</h5>
            <form method="GET" action="{{ route('admin.materi.semua') }}">
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
            <p class="text-muted">Belum ada materi yang diunggah.</p>
        @else
            @foreach($materis as $materi)
                <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                    <h5 class="fw-bold text-primary">{{ $materi->judul }}</h5>
                    
                    <p><strong>Kategori:</strong> {{ ucfirst(str_replace('_', ' ', $materi->kategori)) }}</p>
                    <p><strong>Tipe Media:</strong> {{ strtoupper($materi->jenis) }}</p>

                    {{-- Tampilkan media --}}
                    @if($materi->jenis === 'link')
                            <p><strong>Link:</strong>
                                <a href="{{ $materi->link }}" target="_blank">{{ $materi->link }}</a>
                            </p>

                        @elseif($materi->file_path)
                            @php
                                $ext = pathinfo($materi->file_path, PATHINFO_EXTENSION);
                            @endphp

                            @if($ext === 'mp4')
                                <video controls width="100%">
                                    <source src="{{ asset('storage/'.$materi->file_path) }}" type="video/mp4">
                                    Browser Anda tidak mendukung tag video.
                                </video>

                            @elseif(in_array($ext, ['pdf', 'doc', 'docx']))
                                <a href="{{ asset('storage/'.$materi->file_path) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                  📥  Unduh File ({{ strtoupper($ext) }})
                                </a>

                            @else
                                <p class="text-warning">Format file "{{ $ext }}" tidak didukung.</p>
                            @endif
                        @endif
                    <!-- @if($materi->jenis === 'link')
                        <p><strong>Link:</strong>
                            <a href="{{ $materi->link }}" target="_blank">{{ $materi->link }}</a>
                        </p>
                    @elseif(in_array($materi->jenis, ['pdf','doc','video']))
                        <p>
                            @if($materi->jenis === 'video')
                                <video controls width="100%">
                                    <source src="{{ asset('storage/'.$materi->file_path) }}" type="video/mp4">
                                    Browser Anda tidak mendukung tag video.
                                </video>
                            @else
                                <a href="{{ asset('storage/'.$materi->file_path) }}" target="_blank">
                                    Unduh {{ strtoupper($materi->jenis) }}
                                </a>
                            @endif
                        </p>
                    @endif -->

                    {{-- Jumlah komentar dan like --}}
                        {{-- Like dan Komentar (Read-Only untuk Admin) --}}
                        <div class="mt-3 d-flex align-items-center gap-3">
                            <button class="btn btn-outline-danger btn-sm" disabled>
                                ❤️ Suka ({{ $materi->likes_count ?? 0 }})
                            </button>

                            <button class="btn btn-outline-primary btn-sm" disabled>
                                💬 Komentar ({{ $materi->komentar_count ?? 0 }})
                            </button>
                        </div>

                    <p class="mb-1"><small class="text-muted">Diunggah: {{ $materi->created_at->format('d-m-Y') }}</small></p>

                    <a href="{{ route('admin.materi.show', $materi->id) }}" class="btn btn-outline-primary btn-sm mt-2">
                        Lihat Detail
                    </a>
                </div>
            @endforeach
        @endif

        <a href="{{ route('admin.materi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
