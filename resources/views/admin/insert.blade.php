@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-bold">Record New User</h5>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('insert.done') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold small text-secondary">Name</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   placeholder="jone"
                                   value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold small text-secondary">Email </label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       step="0.01" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       placeholder="example@gmail.com" 
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

                        <div class="mb-4">
                            <label for="role" class="form-label fw-bold small text-secondary">Role</label>
                            <select id="role" 
                                    name="role" 
                                    class="form-select @error('category') is-invalid @enderror">
                                <option value="" selected disabled>Choose a Role...</option>
                                @foreach ($role as $item)
                                   <option value="{{ $item->id }}" {{ old('category') == $item->name ? 'selected' : '' }}>{{ $item->name }}</option> 
                                @endforeach
                                

                                {{-- <option value="utilities" {{ old('category') == 'utilities' ? 'selected' : '' }}>Utilities & Tech</option>
                                <option value="housing" {{ old('category') == 'housing' ? 'selected' : '' }}>Rent & Housing</option>
                                <option value="transportation" {{ old('category') == 'transportation' ? 'selected' : '' }}>Transportation</option>
                                <option value="entertainment" {{ old('category') == 'entertainment' ? 'selected' : '' }}>Entertainment</option>
                                <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option> --}}
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('adminpanal') }}" class="btn btn-light text-secondary border fw-bold px-4">Cancel</a>
                            <button type="submit" class="btn btn-primary fw-bold px-4">Save User</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection