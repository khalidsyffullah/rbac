@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card shadow border-0">
                    <div class="card-header bg-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="m-3 fw-bold">{{ __('Users') }}</h5>
                            @can('user-create')
                                <a class="btn btn-primary m-3 d-flex align-items-center" href="{{ route('users.create') }}">
                                    <i class="bi bi-plus me-2"></i> Create New User
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
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    @can('user-list')
                                                        <a href="{{ route('users.show', $user->id) }}"
                                                           class="btn btn-outline-primary btn-sm"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top"
                                                           title="View">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                    @endcan
                                                    @can('user-edit')
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                           class="btn btn-outline-success btn-sm"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top"
                                                           title="Edit">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                    @endcan
                                                    @can('user-delete')
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="btn btn-outline-danger btn-sm"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="Delete"
                                                                    onclick="return confirm('Are you sure you want to delete this user?');">
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
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection