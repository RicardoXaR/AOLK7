@extends('layouts.app')

@section('title', 'Reset Password - Donation Directory')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 80vh; background-color: #f8f9fa;">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="max-width: 450px; width: 100%;">
        <div class="card-body p-5">

            <div class="text-center mb-4">
                <div class="mb-3">
                    <span class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle text-success" style="width: 60px; height: 60px;">
                        <i class="bi bi-key-fill fs-3"></i>
                    </span>
                </div>
                <h3 class="fw-bold" style="color: var(--deep-indigo);">Forgot Password?</h3>
                <p class="text-muted small">No worries! Enter your email and we'll send you reset instructions.</p>
            </div>

            @if (session('status'))
                <div class="alert alert-success border-0 bg-success bg-opacity-10 text-success small rounded-3 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-1"></i> {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="form-label small fw-bold text-secondary">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted ps-3 rounded-start-pill {{ $errors->has('email') ? 'border-danger text-danger' : '' }}">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input id="email" type="email" class="form-control border-start-0 rounded-end-pill ps-2 py-2 {{ $errors->has('email') ? 'is-invalid border-danger' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                    </div>
                    @error('email')
                        <span class="invalid-feedback d-block ms-2 mt-1 small"><strong><i class="bi bi-exclamation-circle"></i> {{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-green-cta rounded-pill py-2 fw-bold shadow-sm">
                        Send Reset Link
                    </button>
                </div>

                <div class="text-center small">
                    <a href="{{ route('login') }}" class="text-decoration-none text-muted hover-dark">
                        <i class="bi bi-arrow-left me-1"></i> Back to Login
                    </a>
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
    .hover-dark:hover { color: var(--deep-indigo) !important; font-weight: 600; }
    .input-group-text { background: #fff; transition: all 0.3s; }
</style>
@endsection
