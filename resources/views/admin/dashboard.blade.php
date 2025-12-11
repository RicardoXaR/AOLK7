@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: var(--deep-indigo);">Admin Dashboard 🛠️</h1>
        <a href="#" class="btn btn-green-cta rounded-pill">+ Add New Charity</a>
    </div>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <table class="table table-hover mb-0 align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="p-4">Charity Name</th>
                        <th>Category</th>
                        <th>Impact Score</th>
                        <th>Status</th>
                        <th class="text-end p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($charities as $charity)
                    <tr>
                        <td class="p-4 fw-bold text-primary">{{ $charity->name }}</td>
                        <td>{{ $charity->categories->first()->name ?? '-' }}</td>
                        <td><span class="fw-bold text-success">{{ $charity->impact_score }}</span></td>
                        <td>
                            @if($charity->is_verified)
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Verified</span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3">Pending</span>
                            @endif
                        </td>
                        <td class="text-end p-4">
                            <a href="#" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $charities->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
