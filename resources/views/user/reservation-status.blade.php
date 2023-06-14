<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <h2 class="text-center mt-2">Daftar Status Proses Reservasi</h2>
    <div class="container-xxl p-3">
        <table class="table table-bordered">
            <thead>
                <th scope=col>#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Ruang</th>
                <th scope="col">Status Himpunan</th>
                <th scope="col">Status BEM</th>
                <th scope="col">Status Ketua Jurusan</th>
                <th scope="col">Status Reservasi</th>
                <th scope="col">Aksi</th>
            </thead>
            <tbody>
                @foreach ($reservations as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->room->name }}</td>
                        <td>
                            <span class="badge text-bg-{{ $item->approved_by_himpunan == 1 ? 'success' : 'warning' }}">
                                {{ $item->approved_by_himpunan == 1 ? 'Disetujui' : 'pending' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge text-bg-{{ $item->approved_by_bem == 1 ? 'success' : 'warning' }}">
                                {{ $item->approved_by_bem == 1 ? 'Disetujui' : 'Pending' }}
                            </span>
                        </td>
                        <td>
                            <span
                                class="badge text-bg-{{ $item->approved_by_kepala_jurusan == 1 ? 'success' : 'warning' }}">
                                {{ $item->approved_by_kepala_jurusan == 1 ? 'Disetujui' : 'Pending' }}
                            </span>
                        </td>
                        <td>
                            @if ($item->status == 'Approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif ($item->status == 'Rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                        {{-- generate surat --}}
                        <td>
                            <form action="{{ route('user.reservation.generate') }}" method="POST">
                                @csrf
                                <input type="hidden" name="reservation_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-primary">Generate Surat</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
