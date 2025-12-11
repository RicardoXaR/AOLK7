@extends('layouts.app')

@section('title', 'Set New Password - Donation Directory')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 85vh; background-color: #f8f9fa;">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="max-width: 450px; width: 100%;">
        <div class="card-body p-5">

            <div class="text-center mb-4">
                <h3 class="fw-bold" style="color: var(--deep-indigo);">Set New Password</h3>
                <p class="text-muted small">Your new password must be different from previously used passwords.</p>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold text-secondary">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted ps-3 rounded-start-pill">
                            <i class="bi bi-envelope-check"></i>
                        </span>
                        <input id="email" type="email" class="form-control bg-light border-start-0 rounded-end-pill ps-2 py-2" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>
                    </div>
                    @error('email')
                        <span class="invalid-feedback d-block ms-2 mt-1 small"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label small fw-bold text-secondary">New Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted ps-3 rounded-start-pill {{ $errors->has('password') ? 'border-danger text-danger' : '' }}">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input id="password" type="password" class="form-control border-start-0 rounded-end-pill ps-2 py-2 {{ $errors->has('password') ? 'is-invalid border-danger' : '' }}" name="password" required autocomplete="new-password" autofocus placeholder="Min 8 characters">
                    </div>
                    @error('password')
                        <span class="invalid-feedback d-block ms-2 mt-1 small"><strong><i class="bi bi-exclamation-triangle"></i> {{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="form-label small fw-bold text-secondary">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted ps-3 rounded-start-pill">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input id="password-confirm" type="password" class="form-control border-start-0 rounded-end-pill ps-2 py-2" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter password">
                    </div>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-green-cta rounded-pill py-2 fw-bold shadow-sm">
                        Reset Password
                    </button>
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
    .form-control.is-invalid:focus {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1) !important;
    }
    .input-group-text { background: #fff; transition: all 0.3s; }
</style>
@endsection
