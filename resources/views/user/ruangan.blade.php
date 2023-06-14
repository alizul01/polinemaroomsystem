@extends('layout.master')
@section('master')
    @include('user.partials.navbar')
    <main class="flex gap-6 -mt-14 mb-10 px-10">
        <section class="flex flex-col grow gap-4 p-6 bg-white  border-2 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-medium">Ruangan</h1>
                <div>
                    @include('user.partials.components.dropdown')
                    <button type="button"
                        class="text-white bg-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-5 py-3">
                        ...
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4">
                @foreach ($rooms as $room)
                    <x-dashboard.card-room status="kosong" :name="$room->name" :image="$room->image" :capacity="$room->capacity"
                        :code="$room->code" :floor="$room->floor" :id="$room->id" :room="$room" />
                @endforeach
            </div>
        </section>
        <aside class="flex flex-col gap-6 w-1/3">
            <button class="h-[100px] p-6 bg-gray-800 rounded-lg hover:bg-gray-900">
                <span class="text-2xl font-semibold text-white">Buat Peminjaman <i class="bx bx-right-arrow-alt"></i></span>
            </button>
            <section class="flex flex-col gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow-md">
                <form class="flex">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute top-3 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                            placeholder="Cari Ruangan..." required>
                    </div>
                </form>
                <div class="flex items-center gap-5">
                    <form class="flex">
                        <label for="orang" class="sr-only">Jumlah Orang</label>
                        <div class="relative w-full">
                            <input type="text" id="orang"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Jumlah..." required>
                        </div>
                    </form>
                    <span class="font-medium">Jumlah Orang</span>
                </div>
                <div class="flex flex-col gap-4 ml-1">
                    <div class="flex items-center">
                        <input id="kelas-selain-lantai" type="checkbox" value="kelas-selain-lantai"
                            class="w-8 h-8 text-gray-800 bg-gray-100 border-gray-300 rounded focus:ring-gray-700 focus:ring-2">
                        <label for="kelas-selain-lantai" class="ml-2 text-base font-medium text-gray-900">
                            Sertakan kelas selain lantai ini
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input id="kelas-booking" type="checkbox" value="kelas-booking"
                            class="w-8 h-8 text-gray-800 bg-gray-100 border-gray-300 rounded focus:ring-gray-700 focus:ring-2">
                        <label for="kelas-booking" class="ml-2 text-base font-medium text-gray-900">
                            Sertakan kelas yang sudah Dibooking
                        </label>
                    </div>
                </div>
                <button class="text-white bg-gray-500 hover:bg-gray-600 font-medium rounded-lg text-sm px-5 py-3">
                    Lihat Lebih Sedikit
                </button>
                <button class="text-white bg-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-5 py-3">
                    Cari
                </button>
            </section>
        </aside>
    </main>
@endsection
