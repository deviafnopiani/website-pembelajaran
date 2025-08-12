@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow rounded-4 border-0">
            <div class="card-body bg-primary text-white rounded-top-4">
                <h4 class="fw-bold mb-0">Selamat Datang, {{ Auth::user()->name }}!</h4>
                <p class="mb-0">Kelola Informasi Kesehatan, Materi Kesehatan, sesi Zoom dan Pengguna dengan mudah.</p>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-white bg-info shadow rounded-4 border-0">
            <div class="card-body">
                <div class="text-center">
                <div class  = "feature-icon text-center fs-2">🔎</div>
                <h5 class="card-title fw-bold text-center">Informasi Kesehatan</h5>
                <a href="{{ route('admin.informasi-kesehatan.index') }}" class="btn btn-light btn-sm">Kelola Informasi</a>
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
                <a href="{{ route('admin.materi.index') }}" class="btn btn-light btn-sm">Lihat Materi</a>
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
                <a href="{{ route('admin.zoom-rooms.index') }}" class="btn btn-light btn-sm ">Kelola Zoom</a>
            </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card text-white bg-danger shadow rounded-4 border-0">
            <div class="card-body">
                <div class="feature-icon text-center fs-2">🛈</div>
                <h5 class="card-title fw-bold text-center">Manajemen Pengguna</h5>
                <div class="text-center">
                <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-sm">Kelola User</a>
            </div>
        </div>
    </div>
</div>
@endsection
