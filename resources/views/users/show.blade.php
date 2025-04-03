@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white py-3">
            <h3 class="mb-0 fw-bold">User Details</h3>
            <div>
                <a class="btn btn-outline-light btn-sm rounded-pill ms-2" href="{{ route('users.index') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Back to Users">
                    <i class="bi bi-arrow-left-circle-fill"></i> <span class="d-none d-md-inline">Back</span>
                </a>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-2 text-primary"><i class="bi bi-person-fill me-2"></i>Personal Info</h5>
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Name:</label>
                                <p class="fs-5">{{ $user->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Email:</label>
                                <p class="fs-5">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-2 text-primary"><i class="bi bi-calendar-date me-2"></i>Timestamps</h5>
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Created At:</label>
                                <p class="fs-5">{{ $user->created_at->format('d-m-Y H:i') }}</p>
                            </div>
                            @if($user->updated_at)
                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Updated At:</label>
                                <p class="fs-5">{{ $user->updated_at->format('d-m-Y H:i') }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-2 text-primary"><i class="bi bi-shield-lock-fill me-2"></i>Roles & Permissions</h5>
                    <div>
                        <label class="fw-bold text-secondary d-block mb-2">Assigned Roles:</label>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $role)
                                <span class="badge bg-success rounded-pill px-3 py-2 me-2 mb-2 fs-6">
                                    <i class="bi bi-check-circle-fill me-1"></i>{{ $role }}
                                </span>
                            @endforeach
                        @else
                            <span class="text-muted fst-italic">No roles assigned</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4 gap-2">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm rounded-circle shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete User" onclick="return confirm('Are you sure you want to delete this user?')">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection