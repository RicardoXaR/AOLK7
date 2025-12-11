@extends('layouts.app')

@section('title', 'My Profile - Donation Directory')

@section('content')
<section class="py-5" style="background-color: #f8f9fa; min-height: 85vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-success opacity-75" style="height: 100px; background: linear-gradient(135deg, var(--vibrant-green), var(--deep-indigo));"></div>

                    <div class="card-body p-5 text-center position-relative">

                        <div class="position-absolute top-0 start-50 translate-middle">
                            <div class="rounded-circle bg-white p-1 shadow-sm">
                                <div class="rounded-circle bg-light text-success d-flex align-items-center justify-content-center fw-bold display-4 border border-3 border-success"
                                     style="width: 100px; height: 100px;">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 pt-3">
                            <h2 class="fw-bold mb-1" style="color: var(--deep-indigo);">{{ $user->name }}</h2>
                            <p class="text-muted mb-4"><i class="bi bi-envelope me-1"></i> {{ $user->email }}</p>

                            <div class="row g-3 text-start mt-4">
                                <div class="col-12">
                                    <div class="p-3 border rounded-4 bg-light d-flex align-items-center">
                                        <div class="bg-white p-2 rounded-circle shadow-sm me-3 text-primary">
                                            <i class="bi bi-calendar-check fs-5"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Member Since</small>
                                            <span class="fw-semibold">{{ $user->created_at->format('d F Y') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="p-3 border rounded-4 bg-light d-flex align-items-center">
                                        <div class="bg-white p-2 rounded-circle shadow-sm me-3 text-warning">
                                            <i class="bi bi-shield-check fs-5"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.7rem;">Account Status</small>
                                            <span class="fw-semibold text-success">Active Member</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 d-flex gap-2 justify-content-center">
                                <a href="{{ route('home') }}" class="btn btn-outline-dark rounded-pill px-4">Back to Home</a>
                                <a href="{{ route('logout') }}"
                                   class="btn btn-danger rounded-pill px-4"
                                   onclick="event.preventDefault(); document.getElementById('logout-form-profile').submit();">
                                    Logout
                                </a>
                            </div>
                            <form id="logout-form-profile" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
