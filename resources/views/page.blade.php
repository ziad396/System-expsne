@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
        <div class="col-md-6 text-center">
            
            <div class="display-1 fw-bold text-danger mb-2" style="font-size: 6rem; letter-spacing: -2px;">
                404
            </div>
            
            <h2 class="fw-bold text-dark mb-3">Oops! Page Not Found</h2>
            
            <p class="text-muted mb-4 mx-auto" style="max-width: 450px;">
                We're sorry, but the page you are looking for does not exist, has been removed, had its name changed, or is temporarily unavailable.
            </p>
            
            <div class="d-flex justify-content-center gap-3">
                <a href="javascript:history.back()" class="btn btn-outline-secondary fw-bold px-4">
                    ← Go Back
                </a>
                
                <a href="{{ url('/') }}" class="btn btn-primary fw-bold px-4 shadow-sm">
                    Go to Homepage
                </a>
            </div>

        </div>
    </div>
</div>
@endsection