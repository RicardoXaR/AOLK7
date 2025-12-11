@extends('layouts.app')

@section('title', 'Home - Donation Directory')

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(rgba(44, 62, 80, 0.85), rgba(44, 62, 80, 0.9)), url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
        color: var(--clean-white);
        padding: 140px 0;
        text-align: center;
    }

    .hover-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important; }

    .impact-card {
        background-color: #F3F4F6;
        border-radius: 16px;
        padding: 2rem 1rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: none;
        text-decoration: none;
    }

    .impact-card:hover {
        background-color: #ffffff;
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    }

    .impact-icon-img {
        width: auto;
        height: auto;
        max-width: 70px;
        max-height: 70px;
        object-fit: contain;
        margin-bottom: 15px;
        mix-blend-mode: multiply;
        transition: transform 0.3s ease;
    }
    .impact-card:hover .impact-icon-img { transform: scale(1.1); }

    .impact-label {
        font-weight: 800;
        font-size: 1rem;
        margin-bottom: 0;
        letter-spacing: -0.3px;
        line-height: 1.3;
    }

    .section-title { position: relative; display: inline-block; padding-bottom: 10px; }
    .section-title::after {
        content: ''; display: block; width: 60px; height: 4px;
        background: var(--vibrant-green); position: absolute; bottom: 0; left: 50%;
        transform: translateX(-50%); border-radius: 2px;
    }
</style>
@endpush

@section('content')
    <header class="hero-section">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3">Make a Global Impact</h1>
            <p class="lead mb-5 fs-4 opacity-75">Find trusted organizations, verify their impact, and donate with confidence.</p>
            <a href="{{ route('causes') }}" class="btn btn-green-cta btn-lg px-5 py-3 rounded-pill shadow-lg">Explore Causes</a>
        </div>
    </header>

    <section class="container py-5 text-center">
        <div class="mb-5">
            <h2 class="section-title fw-bold mb-2" style="color: var(--deep-indigo);">How It Works</h2>
            <p class="text-muted">Simple steps to start your journey</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4"><div class="p-4"><div class="mb-3 text-primary"><i class="bi bi-search display-4"></i></div><h4 class="fw-bold mb-3">1. Discover</h4><p class="text-muted">Browse a curated list of non-profits.</p></div></div>
            <div class="col-md-4"><div class="p-4"><div class="mb-3 text-success"><i class="bi bi-shield-check display-4"></i></div><h4 class="fw-bold mb-3">2. Verify</h4><p class="text-muted">Check Impact Scores and vetting details.</p></div></div>
            <div class="col-md-4"><div class="p-4"><div class="mb-3 text-danger"><i class="bi bi-heart-fill display-4"></i></div><h4 class="fw-bold mb-3">3. Donate</h4><p class="text-muted">Donate directly knowing they are legitimate.</p></div></div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold mb-2" style="color: var(--deep-indigo);">Our Impact Areas</h2>
                <p class="text-muted">Causes you can support today</p>
            </div>

            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3 justify-content-center align-items-stretch">
                @foreach($categories as $category)
                <div class="col text-center">
                    <a href="{{ route('causes', ['category' => $category->name]) }}" class="text-decoration-none d-block h-100">
                        <div class="impact-card">
                            @php
                                $iconName = 'logo.png';
                                $textColor = '#333';

                                // MAPPING 10 KATEGORI
                                switch($category->name) {
                                    case 'Environment':
                                        $iconName = 'logo-environment.png'; $textColor = '#2E7D32'; break;
                                    case 'Education':
                                        $iconName = 'logo-education.png'; $textColor = '#1565C0'; break;
                                    case 'Health & Wellness':
                                        $iconName = 'logo-health.png'; $textColor = '#C62828'; break;
                                    case 'Animal Welfare':
                                        $iconName = 'logo-animal.png'; $textColor = '#795548'; break;
                                    case 'Humanitarian & Social Services':
                                        $iconName = 'logo-humanitarian.png'; $textColor = '#0277BD'; break;
                                    case 'Disaster & Crisis Response':
                                        $iconName = 'logo-disaster.png'; $textColor = '#E65100'; break;
                                    case 'Rights, Justice & Advocacy':
                                        $iconName = 'logo-rights.png'; $textColor = '#F9A825'; break;
                                    case 'Arts, Culture & Community':
                                        $iconName = 'logo-arts.png'; $textColor = '#6A1B9A'; break;
                                    case 'Faith-Based':
                                        $iconName = 'logo-faith.png'; $textColor = '#00695C'; break;
                                    case 'Technology & Research':
                                        $iconName = 'logo-technology.png'; $textColor = '#37474F'; break;
                                }
                            @endphp

                            <img src="{{ asset('images/'.$iconName) }}"
                                 alt="{{ $category->name }}"
                                 class="impact-icon-img"
                                 onerror="this.src='{{ asset('images/logo.png') }}';">

                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5 container">
        <div class="text-center mb-5">
            <h2 class="section-title fw-bold mb-2" style="color: var(--deep-indigo);">Top Rated Charities</h2>
            <p class="text-muted">Organizations with the highest impact scores.</p>
        </div>

        <div class="row g-4">
            @forelse($charities as $charity)
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card w-100 shadow-sm border-0 rounded-4 overflow-hidden hover-card">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="fw-bold mb-0 lh-sm text-dark pe-2">{{ Str::limit($charity->name, 40) }}</h5>
                            <div class="d-flex gap-2 flex-shrink-0 align-items-center">
                                @if($charity->is_verified)
                                    <span class="badge rounded-pill bg-white border border-primary text-primary d-inline-flex align-items-center gap-1 px-2 py-1" style="font-size: 0.7rem; font-weight: 600;">
                                        <i class="bi bi-patch-check-fill"></i> Verified
                                    </span>
                                @endif
                                @if($charity->is_high_impact)
                                    <span class="badge rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center p-0" style="width: 24px; height: 24px;" title="High Impact">
                                        <i class="bi bi-star-fill" style="font-size: 0.7rem;"></i>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 small text-muted"><i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $charity->country }} <div class="d-flex flex-wrap gap-1 mt-2"> @foreach($charity->categories as $cat) <span class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle rounded-pill fw-normal">{{ $cat->name }}</span> @endforeach </div></div>
                            <p class="text-secondary small flex-fill">{{ Str::limit($charity->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                            <div>
                                <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.85rem; letter-spacing: 1px;">Impact Score</small>
                                <span class="fw-bold text-success fs-4">{{ $charity->impact_score }}</span><span class="text-muted small">/100</span>
                            </div>
                            <a href="{{ route('causes.show', $charity) }}" class="btn btn-outline-success rounded-pill px-4 py-2 fw-semibold btn-sm">Visit Site</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5"><a href="{{ route('causes') }}" class="btn btn-outline-dark btn-lg px-5 rounded-pill">View All Charities <i class="bi bi-arrow-right ms-2"></i></a></div>
    </section>
@endsection
