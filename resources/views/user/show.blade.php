@extends('layout.admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.index') }}">
                        <button class="btn btn-secondary mb-3">Kembali</button>
                    </form>
                    <h6 class="card-title">Detail Pengguna</h6>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control" id="role" name="role" value="{{ $user->role }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="role" name="role"
                            value="{{ $user->nomor_telepon }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Dibuat pada</label>
                        <input type="text" class="form-control" id="role" name="role"
                            value="{{ $user->created_at->diffForHumans() }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Diupdate pada</label>
                        <input type="text" class="form-control" id="role" name="role"
                            value="{{ $user->updated_at->diffForHumans() }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
