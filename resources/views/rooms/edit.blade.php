@extends('layout.admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('room.index') }}">
                        <button class="btn btn-secondary mb-3">Kembali</button>
                    </form>
                    <h6 class="card-title">Edit Ruangan</h6>
                    <form method="POST" action="/admin/room/{{ $room->id }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                                name="code" value="{{ $room->code }}" placeholder="Code">
                            @error('code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $room->name }}" placeholder="Name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="floor" class="form-label">Floor</label>
                            <input type="text" class="form-control @error('floor') is-invalid @enderror" id="floor"
                                name="floor" value="{{ $room->floor }}" placeholder="Floor">
                            @error('floor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="text" class="form-control @error('capacity') is-invalid @enderror"
                                id="capacity" name="capacity" value="{{ $room->capacity }}" placeholder="Capacity">
                            @error('capacity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button id="submit" type="submit" class="btn btn-primary me-2">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
