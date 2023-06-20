@extends('layout.admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.index') }}">
                        <button class="btn btn-secondary mb-3">Kembali</button>
                    </form>
                    <h6 class="card-title">Ubah Data Pengguna</h6>
                    <form method="POST" action="/admin/user/{{ $user->id }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                                value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role">
                                <option disabled>Select your role</option>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Super Admin
                                </option>
                                <option value="bem" {{ $user->role == 'bem' ? 'selected' : '' }}>BEM</option>
                                <option value="kajur" {{ $user->role == 'kajur' ? 'selected' : '' }}>Kajur</option>
                                <option value="hmti" {{ $user->role == 'hmti' ? 'selected' : '' }}>HMTI</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="role" name="nomor_telepon"
                                value="{{ $user->nomor_telepon }}">
                        </div>
                        <button id="submit" type="submit" class="btn btn-primary me-2">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
