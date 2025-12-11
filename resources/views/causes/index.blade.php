@extends('layouts.app')

@section('title', 'Explore Causes - Donation Directory')

@section('content')

@push('styles')
<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }

    .search-input-wrapper {
        border: 2px solid #e0e0e0;
        transition: all 0.3s ease;
    }

    .search-input-wrapper:focus-within {
        border-color: var(--vibrant-green) !important;
        box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1) !important;
    }

    .search-input-wrapper input {
        outline: none !important;
        box-shadow: none !important;
        border: none !important;
    }

    .search-input-wrapper input:focus {
        outline: none !important;
        box-shadow: none !important;
        border: none !important;
    }

    .filter-tag {
        display: inline-block;
        padding: 6px 16px;
        background-color: #f8f9fa;
        color: var(--deep-indigo);
        border-radius: 20px;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        margin-right: 8px;
        transition: all 0.3s ease;
        border: 1px solid #dee2e6;
    }

    .filter-tag:hover {
        background-color: var(--vibrant-green);
        color: white;
        border-color: var(--vibrant-green);
        transform: translateY(-2px);
    }

    .pagination {
        gap: 5px;
        align-items: center;
        justify-content: center;
    }

    .pagination .page-item .page-link,
    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        border-radius: 50px !important;
        margin: 0 2px !important;
        border: 1px solid #dee2e6;
        color: var(--deep-indigo);
        padding: 8px 16px;
        font-weight: 600;
    }

    .pagination .page-item.active .page-link {
        background-color: var(--vibrant-green) !important;
        border-color: var(--vibrant-green) !important;
        color: white !important;
        box-shadow: 0 4px 6px rgba(39, 174, 96, 0.2);
        z-index: 1;
    }

    .pagination .page-item .page-link:hover {
        background-color: #f8f9fa;
        color: var(--vibrant-green);
        border-color: var(--vibrant-green);
        transform: translateY(-1px);
    }

    .page-link:focus {
        box-shadow: none !important;
    }
</style>
@endpush

<section class="py-5" style="background-color: #f8f9fa; min-height: 85vh;">
    <div class="container py-4">

        <h1 class="text-center mb-5 display-5 fw-bold" style="color: var(--deep-indigo);">Explore Causes</h1>

        <form action="{{ route('causes') }}" method="GET">
            <div class="row justify-content-center mb-5">
                <div class="col-md-9">
                    <div class="search-input-wrapper shadow-lg rounded-pill overflow-hidden bg-white p-2">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control form-control-lg border-0 ps-4" placeholder="Search for foundation, country, impact area..." value="{{ request('search') }}" style="height: 60px; font-size: 1.1rem;">
                            <button class="btn btn-green-cta rounded-pill px-5 m-1" type="submit"><i class="bi bi-search me-2"></i> Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap px-2">
            <div class="mb-3 mb-md-0">
                <span class="text-muted me-3 small fw-bold text-uppercase" style="letter-spacing: 1.2px;">Quick Filters:</span>
                <a href="{{ route('causes', ['search' => 'Trending']) }}" class="filter-tag mb-2">#Trending</a>
                <a href="{{ route('causes', ['search' => 'Local']) }}" class="filter-tag mb-2">#Local</a>
                <a href="{{ route('causes', ['search' => 'Environment']) }}" class="filter-tag mb-2">#Environment</a>
                <a href="{{ route('causes', ['search' => 'Education']) }}" class="filter-tag mb-2">#Education</a>
                <a href="{{ route('causes', ['search' => 'Health & Wellness']) }}" class="filter-tag mb-2">#Health & Wellness</a>
                <a href="{{ route('causes', ['search' => 'Animal Welfare']) }}" class="filter-tag mb-2">#Animal Welfare</a>
                <a href="{{ route('causes', ['search' => 'Humanitarian & Social Services']) }}" class="filter-tag mb-2">#Humanitarian & Social Services</a>
                <a href="{{ route('causes', ['search' => 'Disaster & Crisis Response']) }}" class="filter-tag mb-2">#Disaster & Crisis Response</a>
                <a href="{{ route('causes', ['search' => 'Rights, Justice & Advocacy']) }}" class="filter-tag mb-2">#Rights, Justice & Advocacy</a>
                <a href="{{ route('causes', ['search' => 'Arts, Culture & Community']) }}" class="filter-tag mb-2">#Arts, Culture & Community</a>
                <a href="{{ route('causes', ['search' => 'Faith-Based']) }}" class="filter-tag mb-2">#Faith-Based</a>
                <a href="{{ route('causes', ['search' => 'Technology & Research']) }}" class="filter-tag mb-2">#Technology & Research</a>
            </div>
            <div class="dropdown">
                <button class="btn btn-outline-dark dropdown-toggle rounded-pill px-4 py-2" type="button" data-bs-toggle="dropdown"><i class="bi bi-sort-down me-2"></i> Sort by</button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 rounded-4 overflow-hidden">
                    <li><a class="dropdown-item py-2 px-4" href="{{ route('causes', ['sort' => 'newest']) }}">Newest</a></li>
                    <li><a class="dropdown-item py-2 px-4" href="{{ route('causes', ['sort' => 'impact_score']) }}">Impact Score</a></li>
                    <li><a class="dropdown-item py-2 px-4" href="{{ route('causes', ['sort' => 'a-z']) }}">A-Z</a></li>
                </ul>
            </div>
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

                        <div class="mb-3">
                            <div class="small text-muted mb-2"><i class="bi bi-geo-alt-fill text-danger"></i> {{ $charity->country }}</div>
                            <div class="d-flex flex-wrap gap-1">
                                @foreach($charity->categories as $cat)
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle rounded-pill fw-normal" style="font-size: 0.7rem;">
                                        {{ $cat->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <p class="card-text text-secondary mb-4 flex-fill small" style="line-height: 1.6;">
                            {{ Str::limit($charity->description, 100) }}
                        </p>

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
            @empty
            <div class="col-12 text-center py-5">
                <div class="display-1 text-muted mb-3"><i class="bi bi-inbox"></i></div>
                <h3 class="text-muted fw-light">No charities found matching "{{ request('search') }}"</h3>
                <a href="{{ route('causes') }}" class="btn btn-green-cta mt-4 rounded-pill px-5">Reset Search</a>
            </div>
            @endforelse
        </div>

            <div class="mt-5"> <div class="d-flex flex-column align-items-center">

                <p class="text-muted small mb-1"> Showing
                    <span class="fw-bold text-dark">{{ $charities->firstItem() ?? 0 }}</span>
                    to
                    <span class="fw-bold text-dark">{{ $charities->lastItem() ?? 0 }}</span>
                    of
                    <span class="fw-bold text-dark">{{ $charities->total() }}</span>
                    results
                </p>

                <div>
                    {{ $charities->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
