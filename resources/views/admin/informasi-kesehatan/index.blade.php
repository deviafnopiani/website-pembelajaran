@extends('layouts.app')
@section('title', 'Informasi Kesehatan')

@section('content')
<div class="card shadow rounded-4">
<div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
    Daftar Informasi Kesehatan</div>

    <div class="card-body">
    <a href="{{ route('admin.informasi-kesehatan.create') }}" class="btn btn-primary mb-3">+ Tambah Informasi</a>
    <a href="{{ route('admin.informasi-kesehatan.semua') }}" class="btn btn-primary mb-3">Lihat Semua</a>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali</a>


@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Link</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($infos as $info)
                    <tr>
                        <td>{{ $info->judul }}</td>
                        <td><a href="{{ $info->link }}" target="_blank">{{ $info->link }}</a></td>
                        <td>
                            <a href="{{ route('admin.informasi-kesehatan.edit', $info->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.informasi-kesehatan.destroy', $info->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
