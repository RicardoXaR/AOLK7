@extends('layouts.app')

@section('title', 'Login - Donation Directory')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 85vh; background-color: #f8f9fa;">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="max-width: 450px; width: 100%;">
        <div class="card-body p-5">

            <div class="text-center mb-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" height="45" class="mb-3">
                </a>
                <h3 class="fw-bold" style="color: var(--deep-indigo);">Welcome Back!</h3>
                <p class="text-muted small">Please login to continue your impact journey.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold text-secondary">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted ps-3 rounded-start-pill {{ $errors->has('email') ? 'border-danger text-danger' : '' }}">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input id="email" type="email"
                               class="form-control border-start-0 rounded-end-pill ps-2 py-2 {{ $errors->has('email') ? 'is-invalid border-danger' : '' }}"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                               placeholder="name@example.com">
                    </div>

                    @error('email')
                        <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger d-flex align-items-center p-2 rounded-3 mt-2 mb-0 small" role="alert">
                            <i class="bi bi-exclamation-circle-fill me-2"></i>
                            <div>{{ $message }}</div>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label for="password" class="form-label small fw-bold text-secondary">Password</label>
                        @if (Route::has('password.request'))
                            <a class="small text-decoration-none text-muted hover-green" href="{{ route('password.request') }}">Forgot Password?</a>
                        @endif
                    </div>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted ps-3 rounded-start-pill {{ $errors->has('password') ? 'border-danger text-danger' : '' }}">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input id="password" type="password"
                               class="form-control border-start-0 rounded-end-pill ps-2 py-2 {{ $errors->has('password') ? 'is-invalid border-danger' : '' }}"
                               name="password" required autocomplete="current-password"
                               placeholder="••••••••">
                    </div>

                    @error('password')
                        <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger d-flex align-items-center p-2 rounded-3 mt-2 mb-0 small" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <div>{{ $message }}</div>
                        </div>
                    @enderror
                </div>

                <div class="mb-4 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label small text-muted" for="remember">Keep me logged in</label>
                </div>

                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-green-cta rounded-pill py-2 fw-bold shadow-sm">
                        Log In
                    </button>
                </div>

                <div class="text-center small">
                    <span class="text-muted">Don't have an account?</span>
                    <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: var(--vibrant-green);">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .form-control:focus {
        border-color: var(--vibrant-green);
        box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
    }
    .form-control:focus + .input-group-text,
    .input-group:focus-within .input-group-text {
        border-color: var(--vibrant-green);
        color: var(--vibrant-green);
    }

    .form-control.is-invalid:focus,
    .input-group-text.border-danger {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1) !important;
        color: #dc3545 !important;
    }

    .input-group-text { background: #fff; transition: all 0.3s; }
    .hover-green:hover { color: var(--vibrant-green) !important; }
</style>
@endsection
