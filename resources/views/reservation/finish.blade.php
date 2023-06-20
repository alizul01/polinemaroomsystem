@extends('layout.reservation')

@section('content')
    <section class="flex flex-col grow gap-4 p-6 bg-white  border-2 rounded-lg shadow-md w-1/2">
        <div class="flex justify-between flex-col">
            <h1 class="font-bold text-3xl text-slate-700 mb-5">
                Konfirmasi peminjaman
            </h1>
            @php
                $columns = [
                    'start_date' => 'Tanggal Mulai',
                    'start_time' => 'Waktu Mulai',
                    'end_time' => 'Waktu Selesai',
                    'participant' => 'Jumlah Peserta',
                    'keterangan' => 'Keterangan',
                    'user_id' => 'Nama Peminjam',
                ];
            @endphp

            <table class="min-w-full table-auto">
                <thead class="justify-between">
                    <tr class="bg-gray-800">
                        <th class="px-16 py-2">
                            <span class="text-gray-300">No.</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-300">Nama Kolom</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-300">Nilai</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-200">
                    @foreach ($step1 as $key => $value)
                        <tr class="bg-white border-4 border-gray-200">
                            <td class="px-16 py-2">
                                <span>{{ $loop->iteration }}</span>
                            </td>
                            <td class="px-16 py-2">
                                <span>{{ $columns[$key] ?? $key }}</span>
                            </td>
                            <td class="px-16 py-2">
                                @if (in_array($key, ['start_date', 'end_date', 'start_time', 'end_time']))
                                    <span>{{ \Carbon\Carbon::parse($value)->isoFormat('LL') }}</span>
                                @else
                                    <span>{{ $value }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h1 class="font-bold text-3xl text-slate-700 my-5">
                Ruangan yang dipinjam
            </h1>
            <x-card-room :id="$room->id" status="kosong" :isreservation="false" :name="$room->name" :image="$room->image"
                :capacity="$room->capacity" :code="$room->code" :room="$room" :floor="$room->floor" />
            <form action="/reservation/reservation-final" method="POST" class="my-5">
                @csrf
                <button type="submit" id="submitBtn"
                    class="text-white bg-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-5 py-3">
                    Konfirmasi
                </button>
            </form>
        </div>
    </section>
@endsection
