@extends('layouts.app')

@section('title', 'Merchandise - Donation Directory')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: var(--deep-indigo);">Merchandise for Good 🎁</h1>
        <p class="text-muted">100% of profits go directly to our verified charities.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 rounded-4">
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="bi bi-bag-heart display-1 text-secondary opacity-25"></i>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold">Tote Bag "Kindness"</h5>
                    <p class="text-muted small">Eco-friendly material</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-success fs-5">Rp 75.000</span>
                        <button class="btn btn-outline-dark btn-sm rounded-pill">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 rounded-4">
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="bi bi-cup-hot display-1 text-secondary opacity-25"></i>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold">Tumbler "Impact"</h5>
                    <p class="text-muted small">Stainless steel 500ml</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-success fs-5">Rp 150.000</span>
                        <button class="btn btn-outline-dark btn-sm rounded-pill">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
