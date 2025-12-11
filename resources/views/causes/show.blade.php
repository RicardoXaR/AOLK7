@extends('layouts.app')

@section('title', $charity->name)

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-md-8">
            <h1 class="fw-bold mb-2" style="color: var(--deep-indigo);">{{ $charity->name }}</h1>
            <div class="mb-3">
                <i class="bi bi-geo-alt-fill text-danger"></i> {{ $charity->country }}
                @if($charity->is_verified)
                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary rounded-pill px-2 ms-2"><i class="bi bi-patch-check-fill"></i> Verified</span>
                @endif
            </div>
            <p class="text-secondary fs-5">{{ $charity->description }}</p>
        </div>
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 p-4 text-center">
                <h5 class="text-muted text-uppercase fw-bold small">Trust Score</h5>
                <h2 class="display-3 fw-bold text-success">{{ $charity->impact_score }}</h2>
                <a href="{{ $charity->official_url }}" target="_blank" class="btn btn-green-cta w-100 rounded-pill mt-3">Donate Now</a>
            </div>
        </div>
    </div>

    <hr>

    <div class="row mt-5 justify-content-center">
        <div class="col-md-8">
            <h3 class="fw-bold mb-4">Reviews & Experiences</h3>

            @guest
                <div class="alert alert-secondary border-0 rounded-4 text-center py-5">
                    <i class="bi bi-lock-fill display-4 text-muted mb-3 d-block"></i>
                    <h5 class="fw-bold text-secondary">Want to write a review?</h5>
                    <p class="text-muted mb-4">You need to serve as a community member to ensure accountability.</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('login') }}" class="btn btn-deep-indigo text-white px-4 rounded-pill" style="background-color: var(--deep-indigo)">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-dark px-4 rounded-pill">Register</a>
                    </div>
                </div>
            @endguest

            @auth
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background-color: #f8f9fa;">
                    <h5 class="fw-bold mb-3">Hi, {{ Auth::user()->name }}! Share your thought.</h5>
                    <form action="#">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">RATING</label>
                            <select class="form-select w-25">
                                <option>5 - Excellent</option>
                                <option>4 - Good</option>
                                <option>3 - Neutral</option>
                                <option>2 - Bad</option>
                                <option>1 - Terrible</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">YOUR REVIEW</label>
                            <textarea class="form-control" rows="4" placeholder="Tell us about your experience donating to this organization..."></textarea>
                        </div>
                        <button class="btn btn-green-cta rounded-pill px-4">Submit Review</button>
                    </form>
                </div>
            @endauth

            <div class="mt-4">
                <div class="d-flex align-items-start mb-4 border-bottom pb-4">
                    <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">JD</div>
                    <div>
                        <h6 class="fw-bold mb-1">John Doe</h6>
                        <div class="text-warning small mb-2">⭐⭐⭐⭐⭐</div>
                        <p class="text-muted mb-0">Very transparent organization. I got a report on where my money went.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
