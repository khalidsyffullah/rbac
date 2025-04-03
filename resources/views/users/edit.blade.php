@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card border-0">
                <div class="card-header bg-white py-3 shadow-sm border-0 rounded-3 mb-5">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 text-primary">
                            <i class="bi bi-pencil-square me-2"></i>{{ __('Update User') }}
                        </h5>
                        <a class="btn btn-dark shadow-sm px-4" href="{{ route('users.index') }}">
                            <i class="bi bi-arrow-left me-2"></i>Back
                        </a>
                    </div>
                </div>

                <div class="card-body p-4 shadow border-0 rounded-3">
                    <form class="row g-3 needs-validation" novalidate method="POST"
                        action="{{ route('users.update', $users->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="col-12 mb-3">
                            <label for="name" class="form-label fw-bold">
                                <i class="bi bi-person me-2"></i>Name
                            </label>
                            <input type="text" id="name" name="name" class="form-control shadow-sm"
                                value="{{ $users->name }}" placeholder="Enter full name">
                            @error('name')
                                <span class="text-danger">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="email" class="form-label fw-bold">
                                <i class="bi bi-envelope me-2"></i>Email
                            </label>
                            <input type="email" id="email" name="email" class="form-control shadow-sm"
                                value="{{ $users->email }}" placeholder="Enter email address">
                            @error('email')
                                <span class="text-danger">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="password" class="form-label fw-bold">
                                <i class="bi bi-lock me-2"></i>Password
                            </label>
                            <div class="input-group shadow-sm">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Enter new password (leave blank to keep current)">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                                </span>
                            </div>
                            @error('password')
                                <span class="text-danger">
                                    <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">
                                <i class="bi bi-person-badge me-2"></i>User Roles
                            </label>
                            <div class="card shadow-sm border-0 p-3">
                                <div class="row">
                                    @foreach ($roles as $value => $label)
                                        <div class="col-md-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $value }}"
                                                    id="role_{{ $value }}" name="roles[]"
                                                    {{ isset($userRole[$value]) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="role_{{ $value }}">
                                                    {{ $label }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn-primary shadow px-4 py-2" type="submit">
                                <i class="bi bi-check2-circle me-2"></i>Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
