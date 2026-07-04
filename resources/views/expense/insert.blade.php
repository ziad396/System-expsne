@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-bold">Record New Expense</h5>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('expense.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold small text-secondary">Expense Title</label>
                            <input type="text" 
                                   id="title" 
                                   name="title" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   placeholder="e.g., Internet Bill" 
                                   value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="amount" class="form-label fw-bold small text-secondary">Amount ($)</label>
                                <input type="number" 
                                       id="amount" 
                                       name="amount" 
                                       step="0.01" 
                                       class="form-control @error('amount') is-invalid @enderror" 
                                       placeholder="0.00" 
                                       value="{{ old('amount') }}">
                                @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label fw-bold small text-secondary">Date</label>
                                <input type="date" 
                                       id="date" 
                                       name="date" 
                                       class="form-control @error('date') is-invalid @enderror" 
                                       value="{{ old('date', date('Y-m-d')) }}">
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="category" class="form-label fw-bold small text-secondary">Category</label>
                            <select id="category" 
                                    name="category" 
                                    class="form-select @error('category') is-invalid @enderror">
                                <option value="" selected disabled>Choose a category...</option>
                                @foreach ($category as $item)
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
                            <a href="{{ route('expense.index') }}" class="btn btn-light text-secondary border fw-bold px-4">Cancel</a>
                            <button type="submit" class="btn btn-primary fw-bold px-4">Save Expense</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection