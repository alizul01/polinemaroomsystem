@extends('user.reservasi')

@section('content')
    <section class="flex flex-col grow p-6 bg-white border-2 rounded-lg shadow-md min-w-fit">
        <form class="flex flex-col gap-9" action="{{ route('reservation.store') }}" method="POST">
            @csrf
            <div class="flex flex-col gap-4">
                <h1 class="text-xl font-medium">Data Peminjam</h1>
                <div class="flex gap-5">
                    <div class="flex-1">
                        <label for="user_id" class="block mb-2 text-sm text-gray-600">Nama Lengkap
                            <span class="text-red-600">*</span></label>
                        <input type="text" name="user_id" id="user_id" autocomplete="given-name" autofocus
                            class="w-full py-3 bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            value="{{ Auth::user()->name }}" disabled>
                        @error('user_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="nomor_induk" class="block mb-2 text-sm text-gray-600">Nomor Induk
                            <span class="text-red-600">*</span></label>
                        <input type="text" name="nomor_induk" id="nomor_induk" autocomplete="given-nomor_induk"
                            class="w-full py-3 bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            value="{{ Auth::user()->nomor_induk }}" disabled>
                        @error('nomor_induk')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-5">
                    <div class="flex-1">
                        <label for="organization_id" class="block mb-2 text-sm text-gray-600">Asal UKM/OKI
                            <span class="text-red-600">*</span></label>
                        <input type="text" id="organization_name" name="organization_name"
                            value="{{ Auth::user()->organization->name }}"
                            class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            disabled>
                    </div>
                    <div class="flex-1">
                        <label for="phonenumber" class="block mb-2 text-sm text-gray-600">Nomor Telefon
                            <span class="text-red-600">*</span></label>
                        <input type="text" value="{{ Auth::user()->nomor_telepon }}" name="phonenumber" id="phonenumber"
                            autocomplete="given-phonenumber"
                            class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            disabled>
                        @error('phonenumber')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h1 class="text-xl font-medium">Data Peminjaman</h1>
                <div class="flex gap-5">
                    <div class="flex-1">
                        <label for="start_date" class="block mb-2 text-sm text-gray-600">Tanggal Peminjaman
                            <span class="text-red-600">*</span></label>
                        <input type="date" name="start_date" id="start_date" autocomplete="given-start_date"
                            class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        @error('start_date')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="start_time" class="block mb-2 text-sm text-gray-600">Jam Mulai
                            <span class="text-red-600">*</span></label>
                        <input type="time" name="start_time" id="start_time" autocomplete="given-start_time"
                            class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        @error('start_time')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-5">
                    <div class="flex-1">
                        <label for="end_time" class="block mb-2 text-sm text-gray-600">Jam Selesai
                            <span class="text-red-600">*</span></label>
                        <input type="time" name="end_time" id="end_time" autocomplete="given-end_time"
                            class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        @error('end_time')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="participant" class="block mb-2 text-sm text-gray-600">Jumlah Orang</label>
                        <input type="number" name="participant" id="participant" autocomplete="given-participant"
                            min="1"
                            class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        @error('participant')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h1 class="text-xl font-medium">Keterangan</h1>
                <div class="flex gap-5">
                    <div class="flex-1">
                        <label for="keterangan" class="block mb-2 text-sm text-gray-600">Keterangan
                            Tambahan</label>
                        <textarea name="keterangan" id="keterangan" rows="4"
                            class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                        @error('keterangan')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex justify-between">
                <span>Keterangan: <span class="text-red-600">*</span> harus diisi</span>
                <button type="submit" id="submit"
                    class="flex gap-1 justify-center items-center text-white bg-gray-700 font-medium rounded-lg p-3 text-center hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-100">
                    Lanjutkan<i class="bx bx-right-arrow-alt text-xl"></i>
                </button>
            </div>
        </form>
    </section>
@endsection
