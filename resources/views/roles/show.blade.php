@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow border-0">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white py-3">
            <h5 class="mb-0 fw-bold">Role Details</h5>
            <div>
                <a class="btn btn-outline-light btn-sm rounded-pill ms-2" href="{{ route('roles.index') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Back to Roles">
                    <i class="bi bi-arrow-left-circle-fill"></i> <span class="d-none d-md-inline">Back</span>
                </a>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-2 text-primary"><i class="bi bi-shield-fill me-2"></i>Role Info</h5>
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Name:</label>
                                <p class="fs-5">{{ $role->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Created At:</label>
                                <p class="fs-5">{{ $role->created_at->format('d-m-Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-2 text-primary"><i class="bi bi-key-fill me-2"></i>Permissions</h5>
                            <div>
                                <label class="fw-bold text-secondary d-block mb-2">Assigned Permissions:</label>
                                @if(!empty($rolePermissions))
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($rolePermissions as $v)
                                            <span class="badge bg-primary rounded-pill px-3 py-2 me-1 mb-1 fs-6">
                                                <i class="bi bi-check-circle-fill me-1"></i>{{ $v->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-muted fst-italic">No permissions assigned</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4 gap-2">
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Role">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Role" onclick="return confirm('Are you sure you want to delete this role?')">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection