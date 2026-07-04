@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Welcome Back</h3>
                        <p class="text-muted small">Sign in to your account</p>
                    </div>

                    <form action="{{ route('send') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label text-secondary small fw-bold">
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="name@example.com"
                                value="{{ old('email') }}"
                            >

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-secondary small fw-bold">
                                Password
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="••••••••"
                            >

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember"
                            >

                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold">
                                Login
                            </button>
                        </div>

                        <div class="text-center">
                            <span class="text-muted small">
                                Don't have an account?
                            </span>

                            <a href="{{ route('user.create') }}"
                               class="text-decoration-none fw-bold">
                                Register
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection