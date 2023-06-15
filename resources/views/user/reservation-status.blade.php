@extends('layout.master')
@section('master')
    @include('user.partials.navbar')
    <main class="flex gap-6 -mt-14 mb-10 px-10">
        <section class="flex flex-col grow gap-4 p-6 bg-white  border-2 rounded-lg shadow-md">
            <div class="flex flex-col gap-3 justify-center">
                <h1 class="text-xl font-medium">Proses Peminjaman</h1>
                <span class="text-gray-500 font-light text-sm">Lihat proses peminjaman mu di halaman ini</span>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left">
                    <thead class="text-sm text-center text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Diajukan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ruangan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Dipakai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center font-medium text-gray-900">
                        @foreach ($reservations as $item)
                            <x-table.process-body :id="$item->id" :no="$loop->iteration" dateFiled="23 Maret 2023"
                                room="LPY 3" :date-use="1" :status="$item->status" :issteponeapproved="$item->approved_by_himpunan"
                                :reasonone="$item->approved_by_himpunan_at" />
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection
