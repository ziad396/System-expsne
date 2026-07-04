@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-bold">Update User: {{ $user->name }}</h5>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('update.done', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold small text-secondary">Name</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="John Doe"
                                   value="{{ old('name', $user->name) }}"> @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold small text-secondary">Email</label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="example@gmail.com" 
                                   value="{{ old('email', $user->email) }}"> @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label text-secondary small fw-bold">Password</label>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Leave blank to keep current password"> @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label text-secondary small fw-bold">Confirm New Password</label>
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
                                    class="form-select @error('role') is-invalid @enderror"> <option value="" disabled>Choose a Role...</option>
                                
                                @foreach ($role as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('role', $user->roles->first()?->id) == $item->id ? 'selected' : '' }}>
                                        {{$item->name }}
                                    </option> 
                                @endforeach
                            </select>
                            @error('role') <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('adminpanal') }}" class="btn btn-light text-secondary border fw-bold px-4">Cancel</a>
                            <button type="submit" class="btn btn-primary fw-bold px-4">Save Changes</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection