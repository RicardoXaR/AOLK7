@extends('layouts.app')

@section('title', 'Register - Donation Directory')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 85vh; background-color: #f8f9fa;">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="max-width: 550px; width: 100%;">
        <div class="card-body p-5">

            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" height="45" class="mb-3">
                </a>
                <h3 class="fw-bold" style="color: var(--deep-indigo);">Join the Movement 🌍</h3>
                <p class="text-muted small">Create an account to start supporting verified charities.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label small fw-bold text-secondary">Full Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted ps-3 rounded-start-pill {{ $errors->has('name') ? 'border-danger text-danger' : '' }}">
                            <i class="bi bi-person"></i>
                        </span>
                        <input id="name" type="text"
                               class="form-control border-start-0 rounded-end-pill ps-2 py-2 {{ $errors->has('name') ? 'is-invalid border-danger' : '' }}"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                               placeholder="John Doe">
                    </div>
                    @error('name')
                        <span class="invalid-feedback d-block ms-2 mt-1 small">
                            <strong><i class="bi bi-exclamation-circle me-1"></i> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold text-secondary">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted ps-3 rounded-start-pill {{ $errors->has('email') ? 'border-danger text-danger' : '' }}">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input id="email" type="email"
                               class="form-control border-start-0 rounded-end-pill ps-2 py-2 {{ $errors->has('email') ? 'is-invalid border-danger' : '' }}"
                               name="email" value="{{ old('email') }}" required autocomplete="email"
                               placeholder="name@example.com">
                    </div>
                    @error('email')
                        <span class="invalid-feedback d-block ms-2 mt-1 small">
                            <strong><i class="bi bi-exclamation-circle me-1"></i> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row g-2">
                    <div class="col-md-6 mb-2">
                        <label for="password" class="form-label small fw-bold text-secondary">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted ps-3 rounded-start-pill {{ $errors->has('password') ? 'border-danger text-danger' : '' }}">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input id="password" type="password"
                                   class="form-control border-start-0 rounded-end-pill ps-2 py-2 {{ $errors->has('password') ? 'is-invalid border-danger' : '' }}"
                                   name="password" required autocomplete="new-password"
                                   placeholder="Min. 8 chars">
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="password-confirm" class="form-label small fw-bold text-secondary">Confirm</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted ps-3 rounded-start-pill {{ $errors->has('password') ? 'border-danger text-danger' : '' }}">
                                <i class="bi bi-shield-lock"></i>
                            </span>
                            <input id="password-confirm" type="password"
                                   class="form-control border-start-0 rounded-end-pill ps-2 py-2 {{ $errors->has('password') ? 'is-invalid border-danger' : '' }}"
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Re-type password">
                        </div>
                    </div>
                </div>

                @error('password')
                    <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger d-flex align-items-center p-2 rounded-3 mb-3 small" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                        <div>{{ $message }}</div>
                    </div>
                @enderror

                <div class="d-grid mb-4 mt-2">
                    <button type="submit" class="btn btn-green-cta rounded-pill py-3 fw-bold shadow-sm">
                        Create Account
                    </button>
                </div>

                <div class="text-center small">
                    <span class="text-muted">Already have an account?</span>
                    <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: var(--vibrant-green);">Log In</a>
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
</style>
@endsection
