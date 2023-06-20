@extends('layout.master')
@section('master')
    @include('partials.navbar')
    <main class="flex gap-6 -mt-14 mb-10 px-10">
        <aside class="flex flex-col max-h-[25rem] gap-8 p-6 bg-white border border-gray-200 rounded-lg shadow-md w-1/3">
            <h1 class="font-medium text-xl">Alur Peminjaman</h1>
            <div class="flex items-center gap-7">
                <span
                    class="text-white {{ $step >= 1 ? 'bg-green-500' : '' }} font-medium rounded-full text-lg py-3.5 px-6 text-center">1</span>
                <div class="flex flex-col gap-1">
                    <h2 class="font-medium text-lg">Mengisi Data</h2>
                    <p class="text-gray-500 text-sm">
                        Mengisi data untuk keperluan peminjaman seperti data diri, data ruangan, dan keterangan
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-7">
                <span
                    class="{{ $step >= 2 ? 'bg-green-500 text-white' : 'bg-gray-300' }} font-medium rounded-full text-lg py-3.5 px-6 text-center">2</span>
                <div class="flex flex-col gap-1">
                    <h2 class="font-medium text-lg">Pilih Ruangan</h2>
                    <p class="text-gray-500 text-sm">
                        Pilih ruangan berdasarkan keperluan anda atau pilih ruangan dari saran kami
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-7">
                <span class="{{ $step >= 3 ? 'bg-green-500 text-white' : 'bg-gray-300' }} font-medium rounded-full text-lg py-3.5 px-6 text-center">3</span>
                <div class="flex flex-col gap-1">
                    <h2 class="font-medium text-lg">Form Final</h2>
                    <p class="text-gray-500 text-sm">
                        Lihat form anda dalam bentuk surat
                    </p>
                </div>
            </div>
        </aside>
        @yield('content')
    </main>
@endsection
