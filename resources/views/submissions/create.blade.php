@extends('layouts.app')

@section('title', 'Submit Charity - Donation Directory')

@section('content')
<section class="py-5" style="background-color: #f8f9fa; min-height: 90vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-success p-4 text-center text-white" style="background: linear-gradient(135deg, var(--vibrant-green), var(--deep-indigo));">
                        <h2 class="fw-bold mb-1">Submit Your Program</h2>
                        <p class="mb-0 opacity-75">Join our global network of high-impact charities.</p>
                    </div>

                    <div class="card-body p-5">
                        <form action="{{ route('submissions.store') }}" method="POST">
                            @csrf

                            <h5 class="fw-bold text-dark mb-4 border-bottom pb-2">Organization Details</h5>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Organization Name</label>
                                    <input type="text" name="organization_name" class="form-control rounded-3 py-2" placeholder="e.g. Save The Earth" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Program Title</label>
                                    <input type="text" name="program_name" class="form-control rounded-3 py-2" placeholder="e.g. Reforestation 2025" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Category</label>
                                    <select name="category" class="form-select rounded-3 py-2" required>
                                        <option value="" selected disabled>Select Impact Area</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Country</label>
                                    <input type="text" name="country" class="form-control rounded-3 py-2" placeholder="e.g. Indonesia" required>
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark mb-4 border-bottom pb-2 mt-5">Program Details</h5>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-secondary">Contact Email</label>
                                <input type="email" name="contact_email" class="form-control rounded-3 py-2" placeholder="contact@organization.org" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-secondary">Website / Social Media URL (Optional)</label>
                                <input type="url" name="website_url" class="form-control rounded-3 py-2" placeholder="https://...">
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold text-secondary">Description & Impact Plan</label>
                                <textarea name="description" class="form-control rounded-3" rows="5" placeholder="Describe your charity program and the impact you aim to achieve..." required></textarea>
                                <div class="form-text">Minimum 50 characters.</div>
                            </div>

                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-green-cta rounded-pill py-3 fw-bold shadow-sm">
                                    Submit for Verification
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
    .form-control:focus, .form-select:focus {
        border-color: var(--vibrant-green);
        box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
    }
</style>
@endsection
