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
                            <a href="{{ route('room.create') }}" class="text-white">Tambah Ruangan</a>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Nama Ruangan</th>
                                    <th class="pt-0">Lantai</th>
                                    <th class="pt-0">Kapasitas</th>
                                    <th class="pt-0">Image</th>
                                    <th class="pt-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->floor }}</td>
                                        <td>{{ $item->capacity }}</td>
                                        <td> <img src="{{ $item->image }}" width="100px" height="100px">
                                        </td>
                                        <td class="d-flex justify-content-start gap-2 ">
                                            <a href="{{ route('room.show', $item->id) }}" class="btn btn-info">Show</a>
                                            <a href="{{ route('room.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                            <form id="form-{{ $item->id }}"
                                                action="/admin/room/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmDelete('form-{{ $item->id }}')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $rooms->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
