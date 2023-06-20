@extends('layout.admin.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Polinema Room System - ADMIN</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card gap-2">
            <div class="col-lg-6 col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-3">
                            <h6 class="card-title mb-0">Akun Pengguna</h6>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 d-flex justify-content-start">
                                <div>
                                    <label
                                        class="d-flex align-items-center justify-content-start tx-10 text-uppercase fw-bolder">
                                        Total User
                                    </label>
                                    <h5 class="fw-bolder mb-0 text-start">
                                        {{ $users }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">
                                <a href="{{ route('user.index') }}" class="text-white">Manage Akun User</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-3">
                            <h6 class="card-title mb-0">Ruangan Kampus</h6>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 d-flex justify-content-start">
                                <div>
                                    <label
                                        class="d-flex align-items-center justify-content-start tx-10 text-uppercase fw-bolder">
                                        Total
                                        Ruangan </label>
                                    <h5 class="fw-bolder mb-0 text-start">
                                        {{ $rooms }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">
                                <a href="/admin/room" class="text-white">Manage Ruangan Kampus</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4">
                        <h6 class="card-title mb-0">Log</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Nama Peminjam</th>
                                    <th class="pt-0">Ruangan</th>
                                    <th class="pt-0">Tanggal Peminjaman</th>
                                    <th class="pt-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservation as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->room->name }}</td>
                                        <td> {{ \Carbon\Carbon::parse($item->start)->format('d/m/Y') }} </td>
                                        <td>
                                            @if ($item->status == 'Approved')
                                                <span class="badge bg-success">Approved</span>
                                            @elseif ($item->status == 'Pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif ($item->status == 'Rejected')
                                                <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
