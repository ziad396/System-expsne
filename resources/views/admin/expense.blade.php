@extends('layout.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        
        <div class="col-md-4 col-lg-3 mb-4">
            @include('layout.sidebar')
        </div>

        <div class="col-md-8 col-lg-9">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3 text-dark">Recent Transactions</h5>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>User</th>
                                    <th class="text-end">Amount</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expense as $item)
                                    <tr>
                                        <td class="text-muted small">
                                            {{ $item->date ? $item->date->format('d/m/Y') : 'N/A' }}
                                        </td>l
                                        <td class="fw-bold text-secondary">{{ $item->title }}</td>
                                       
                                        <td>
                                            <span class="badge bg-success-subtle text-success">
                                                {{ $item->category->name ?? 'Uncategorized' }}
                                            </span>
                                        </td>
                                         <td>{{ $item->user->name }}</td>
                                        <td class="text-end text-success fw-bold">${{ number_format($item->amount, 2) }}</td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-2 justify-content-end">
                                                <a href="{{ route('update.expense', $item->id) }}" class="btn btn-sm btn-primary fw-bold px-3">
                                                    Update
                                                </a>
                                                
                                                <form action="{{ route('delete.expense', $item->id) }}" method="POST" class="d-inline m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger fw-bold px-3" onclick="return confirm('Are you sure you want to delete this?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> </div>
</div>
@endsection