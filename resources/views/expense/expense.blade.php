@extends('layout.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Expense Tracker</h2>
                <p class="text-muted small mb-0">Welcome back, {{ auth()->user()->name }}!</p>
            </div>

            <div class="d-flex gap-2">
                @if(auth()->user()->roles->contains('name', 'admin'))
                    <a href="{{ route('adminpanal') }}" class="btn btn-outline-primary fw-bold px-4">Admin Panel</a>
                @endif
                <a href="{{ route('logout') }}" class="btn btn-primary fw-bold px-4">Logout</a>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-gradient text-white text-bg-dark">
                    <div class="card-body p-4">
                        <span class="text-white-50 small fw-bold text-uppercase">Monthly Budget</span>
                        <h2 class="fw-bold my-2">$5,000.00</h2> <span class="small text-muted">Starting limit</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-white text-dark">
                    <div class="card-body p-4">
                        <span class="text-muted small fw-bold text-uppercase">Total Expenses Spent</span>
                        <h2 class="fw-bold my-2 text-danger">-${{ number_format($totalExpense, 2) }}</h2>
                        <span class="small text-muted">Total pulled from your database</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Recent Transactions</h5>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Description (Title)</th>
                                        <th class="text-end">Amount</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($expense as $item)
                                        <tr>
                                            <td class="text-muted small">
                                                {{ is_string($item->date) ? date('d/m/Y', strtotime($item->date)) : $item->date->format('d/m/Y') }}
                                            </td>
                                            <td class="fw-bold">{{ $item->title }}</td>
                                            <td class="text-end fw-bold text-danger">
                                                ${{ number_format($item->amount, 2) }}
                                            </td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end gap-2">
                                                    <a href="{{ route('expense.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary fw-bold">Edit</a>
                                                    
                                                    <form action="{{ route('expense.destroy', $item->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger fw-bold" onclick="return confirm('Are you sure you want to delete this?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-muted">No expenses recorded yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="{{ route('expense.create') }}" class="btn btn-primary fw-bold px-4">
                        + Add Expense
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection