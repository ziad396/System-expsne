@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Create an Account</h3>
                        <p class="text-muted small">Please fill out the form below to register</p>
                    </div>

                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label text-secondary small fw-bold">Full Name</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="John Doe" 
                                   value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-secondary small fw-bold">Email Address</label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="name@example.com" 
                                   value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label text-secondary small fw-bold">Password</label>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="••••••••">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label text-secondary small fw-bold">Confirm Password</label>
                            <input type="password" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   class="form-control" 
                                   placeholder="••••••••">
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg fs-6 fw-bold">
                                Sign Up
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <span class="text-muted small">Already have an account? </span>
                            <a href="{{ route('user.login') }}" class="text-decoration-none small fw-bold">Log In</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection