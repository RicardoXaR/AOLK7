@extends('layouts.app')

@section('title', 'About Us - Donation Directory')

@section('content')
    <header class="py-5 bg-white text-center">
        <div class="container py-5">
            <h1 class="display-4 fw-bold mb-3" style="color: var(--deep-indigo);">Who We Are</h1>
            <p class="lead text-muted mx-auto" style="max-width: 600px;">
                We are bridging the gap between generous hearts and trustworthy causes through transparency and technology.
            </p>
        </div>
    </header>

    <section class="py-5" style="background-color: var(--deep-indigo); color: white;">
        <div class="container py-4">
            <div class="row g-5 align-items-center">
                <div class="col-md-6">
                    <div class="p-4 border border-secondary rounded-4 bg-opacity-10 bg-white h-100">
                        <div class="mb-3 text-warning display-5"><i class="bi bi-bullseye"></i></div>
                        <h2 class="fw-bold mb-3">Our Mission</h2>
                        <p class="fs-5 text-white-50">
                            To empower donors with the data they need to give confidently. We verify, rate, and curate charities to ensure every penny creates a real impact.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4 border border-secondary rounded-4 bg-opacity-10 bg-white h-100">
                        <div class="mb-3 text-warning display-5"><i class="bi bi-eye"></i></div>
                        <h2 class="fw-bold mb-3">Our Vision</h2>
                        <p class="fs-5 text-white-50">
                            A world where transparency fuels generosity, and every legitimate cause has the resources to change lives without barriers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-4" style="color: var(--deep-indigo);">Why Donation Directory?</h2>
                    <p class="text-secondary fs-5 mb-4" style="line-height: 1.8;">
                        It started with a simple question: <em>"Where does my money actually go?"</em>
                    </p>
                    <p class="text-secondary" style="line-height: 1.8;">
                        In a world filled with thousands of charities, finding the right one can be overwhelming. We realized that <strong>trust</strong> is the currency of giving. That's why we built the <strong>Donation Directory</strong>.
                    </p>
                    <p class="text-secondary" style="line-height: 1.8;">
                        We don't just list charities; we analyze them. Using our proprietary <strong>Impact Score</strong>, we evaluate organizations on financial transparency, accountability, and actual results. Whether you care about the environment, education, or animal welfare, we help you find the heroes worth supporting.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container text-center py-4">
            <h2 class="fw-bold mb-4">Ready to Make a Difference?</h2>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('causes') }}" class="btn btn-green-cta rounded-pill px-5">Explore Causes</a>
                <a href="{{ route('register') }}" class="btn btn-outline-dark rounded-pill px-5 py-2" style="font-size: 1.1rem;">Join Community</a>
            </div>
        </div>
    </section>
@endsection
