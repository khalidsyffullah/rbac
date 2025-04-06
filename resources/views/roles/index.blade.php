@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card shadow border-0">
                    <div class="card-header bg-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="m-3 fw-bold">{{ __('Roles') }}</h5>
                            @can('role-create')
                                <a class="btn btn-primary m-3 d-flex align-items-center" href="{{ route('roles.create') }}">
                                    <i class="bi bi-plus me-2"></i> Create New Role
                                </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    @can('role-list')
                                                        <a href="{{ route('roles.show', $role->id) }}"
                                                           class="btn btn-outline-primary btn-sm"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top"
                                                           title="View">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                    @endcan
                                                    @can('role-edit')
                                                        <a href="{{ route('roles.edit', $role->id) }}"
                                                           class="btn btn-outline-success btn-sm"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top"
                                                           title="Edit">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                    @endcan
                                                    @can('role-delete')
                                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="btn btn-outline-danger btn-sm"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="Delete"
                                                                    onclick="return confirm('Are you sure you want to delete this role?');">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
