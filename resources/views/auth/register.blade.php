@extends('layouts.app')

@section('content')
<div class="container py-5" style="min-height: 100vh; background: linear-gradient(to bottom, #3db2ff, #007bff);">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-white text-center fs-4 fw-bold rounded-top-4" style="background-color: #007bff;">
                    Daftar Akun SmartHealth
                </div>
                <div class="card-body p-4">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold text-primary">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold text-primary">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold text-primary">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-semibold text-primary">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a class="text-decoration-none text-primary" href="{{ route('login') }}">
                                Sudah punya akun?
                            </a>
                        </div>
                     <a href="{{ route('home') }}" class="btn btn-secondary center">Kembali</a>
                    <button type="submit" class="btn btn-primary ">
                                Daftar
                    </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
