@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card border-0">
                <div class="card-header bg-white py-3 shadow-sm border-0 rounded-3 mb-5">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 text-primary">
                            <i class="bi bi-shield-check me-2"></i>{{ __('Update Role') }}
                        </h5>
                        <a class="btn btn-dark shadow-sm px-4" href="{{ route('roles.index') }}">
                            <i class="bi bi-arrow-left me-2"></i>Back
                        </a>
                    </div>
                </div>

                <div class="card-body p-4 shadow border-0 rounded-3">
                    <form class="row g-3 needs-validation" novalidate method="POST"
                        action="{{ route('roles.update', $role->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="col-12 mb-3">
                            <label for="name" class="form-label fw-bold">
                                <i class="bi bi-tag me-2"></i>Role Name
                            </label>
                            <input type="text" id="name" name="name" class="form-control shadow-sm"
                                value="{{ $role->name }}" placeholder="Enter role name">
                            @error('name')
                                <span class="text-danger">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">
                                <i class="bi bi-key me-2"></i>Permissions
                            </label>
                            <div class="card shadow-sm border-0 p-3">
                                <div class="row">
                                    @foreach ($permission as $value)
                                        <div class="col-md-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    id="permission_{{ $value->id }}"
                                                    name="permission[{{ $value->id }}]" value="{{ $value->id }}"
                                                    {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="permission_{{ $value->id }}">
                                                    {{ $value->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @error('permission')
                                <span class="text-danger">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn-primary shadow px-4 py-2" type="submit">
                                <i class="bi bi-check2-circle me-2"></i>Update Role
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
