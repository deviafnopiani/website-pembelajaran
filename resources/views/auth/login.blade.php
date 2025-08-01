@extends('layouts.app')

@section('content')
<div class="container py-5" style="min-height: 100vh; background: linear-gradient(to bottom, #3db2ff, #007bff);">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-white text-center fs-4 fw-bold rounded-top-4" style="background-color: #007bff;">
                    Login SmartHealth
                </div>
                <div class="card-body p-4">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold text-primary">Email</label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email"
                                   value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold text-primary">Password</label>
                            <input type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label text-secondary" for="remember">
                                Ingat Saya
                            </label>
                        </div>

                        <!-- Link & Action -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a class="text-decoration-none text-primary" href="{{ route('register') }}">
                                Belum punya akun?
                            </a>
                            <!-- @if (Route::has('password.request'))
                                <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">
                                    Lupa Password?
                                </a>
                            @endif -->
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                            <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
