@extends('layout.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        
        <div class="col-md-4 col-lg-3 mb-4">
            @include('layout.sidebar')
        </div>

        <div class="col-md-8 col-lg-9">
            <div class="tab-content" id="adminTabsContent">
                
                <div class="tab-pane fade show active" id="users-pane" role="tabpanel" aria-labelledby="users-tab">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="fw-bold mb-0">System Users</h4>
                                <a href="{{route('insert.user')  }}" class="btn btn-primary fw-bold btn-sm px-3">+ Add New User</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($user as $item)
                                                {{-- {{ dd($item) }} --}}
                                            
                                            <td>{{ $item->id }}</td>
                                            <td class="fw-bold">{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td><span class="badge bg-danger">{{ $item->roles->first()->name }}</span></td>
                                            <td class="text-end">
                                                <a href="{{ route('update.user',$item->id) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                                                {{-- <a href="{{ route('delete.user',$item->id) }}" class="btn btn-sm btn-outline-secondary me-1">Delete</a> --}}
                                                <form action="{{ route('delete.user',$item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="expenses-pane" role="tabpanel" aria-labelledby="expenses-tab">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="fw-bold mb-0">Global Expenses</h4>
                                <a href="" class="btn btn-primary fw-bold btn-sm px-3">+ Insert Expense</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>User</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th class="text-end">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-muted small">June 30, 2026</td>
                                            <td class="fw-bold">John Doe</td>
                                            <td>Office Supplies Bulk Purchase</td>
                                            <td><span class="badge bg-warning-subtle text-warning">Utilities</span></td>
                                            <td class="text-end text-danger fw-bold">-$340.50</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection