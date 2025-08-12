@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow rounded-4 border-0">
            <div class="card-body bg-primary text-white rounded-top-4">
                <h4 class="fw-bold mb-0">Selamat Datang, {{ Auth::user()->name }}!</h4>
                <p class="mb-0">Dapatkan informasi, Materi, Pengguna, dan sesi Zoom dengan mudah.</p>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-white bg-info shadow rounded-4 border-0">
            <div class="card-body">
                <div class="text-center">
                <div class  = "feature-icon text-center fs-2">🔎</div>
                <h5 class="card-title fw-bold text-center">Informasi Kesehatan</h5>
                <a href="{{ route('user.informasi-kesehatan.index') }}" class="btn btn-light btn-sm">Lihat Informasi</a>
            </div>
        </div>
    </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success shadow rounded-4 border-0">
            <div class="card-body">
                <div class="text-center">
                <div class  = "feature-icon text-center fs-2">📚</div>
                <h5 class="card-title fw-bold text-center">Materi Edukasi</h5>
                <a href="{{ route('user.materi.index') }}" class="btn btn-light btn-sm">Lihat Materi</a>
            </div>
        </div>
</div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning shadow rounded-4 border-0">
            <div class="card-body">
                <div class="feature-icon text-center fs-2">🎥</div>
                <h5 class="card-title fw-bold text-center">Zoom Meeting</h5>
                <div class="text-center">
                <a href="{{ route('user.zoom-rooms.index') }}" class="btn btn-light btn-sm ">Lihat Jadwal Zoom</a>
            </div>
            </div>
        </div>
    </div>

    
@endsection
