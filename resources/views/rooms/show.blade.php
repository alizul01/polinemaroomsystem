@extends('layout.admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('room.index') }}">
                        <button class="btn btn-secondary mb-3">Kembali</button>
                    </form>
                    <h6 class="card-title">Detail Ruangan</h6>

                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control" id="code" name="code" value="{{ $room->code }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="floor" class="form-label">Floor</label>
                        <input type="text" class="form-control" id="floor" name="floor" value="{{ $room->floor }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Capacity</label>
                        <input type="text" class="form-control" id="capacity" name="capacity"
                            value="{{ $room->capacity }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">Dibuat pada</label>
                        <input type="text" class="form-control" id="created_at" name="created_at"
                            value="{{ $room->created_at->diffForHumans() }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="form-label">Diupdate pada</label>
                        <input type="text" class="form-control" id="updated_at" name="updated_at"
                            value="{{ $room->updated_at->diffForHumans() }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
