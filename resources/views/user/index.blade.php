@extends('layout.admin.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4">
                        <h6 class="card-title mb-0">Users</h6>
                        <button class="btn btn-primary">
                            <i data-feather="plus"></i>
                            <a href="{{ route('user.create') }}" class="text-white">Tambah User</a>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Name</th>
                                    <th class="pt-0">Email</th>
                                    <th class="pt-0">Role</th>
                                    <th class="pt-0">Organization</th>
                                    <th class="pt-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->organization->name }}</td>
                                        <td class="d-flex justify-content-start gap-2 ">
                                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">Show</a>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                            <form id="form-{{ $user->id }}"
                                                action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmDelete('form-{{ $user->id }}')">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $users->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
