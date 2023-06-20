@extends('layout.admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.index') }}">
                        <button class="btn btn-secondary mb-3">Kembali</button>
                    </form>
                    <h6 class="card-title">Buat pengguna baru</h6>
                    <form method="POST" action="/admin/user">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                                placeholder="Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ @old('email') }} }}" />
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off"
                                placeholder="Password" value="{{ @old('password') }} }}" />
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role">
                                <option selected disabled>Select your role</option>
                                <option value="user">User</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="bem">BEM</option>
                                <option value="kajur">Kajur</option>
                                <option value="hmti">HMTI</option>
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
