@extends('user.reservasi')

@section('content')
    <section class="flex flex-col grow gap-4 p-6 bg-white  border-2 rounded-lg shadow-md w-1/2">
        <div class="flex justify-between">
            <h1 class="text-xl font-medium">Pilih Ruangan</h1>
            <div class="flex justify-end gap-3 my-auto">
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
                            class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                            placeholder="Cari Ruangan..." required>
                    </div>
                </form>
                @include('user.partials.components.dropdown')
            </div>
        </div>
        <form method="POST">
            @csrf
            <div class="grid grid-cols-3 gap-4">
                @foreach ($rooms as $room)
                    <x-dashboard.card-room :id="$room->id" status="kosong" :name="$room->name" :image="$room->image"
                        :capacity="$room->capacity" :isreservation="true" :code="$room->code" :room="$room" :floor="$room->floor" />
                @endforeach
            </div>
            {{ $rooms->links('pagination::tailwind') }}
            <input type="text" id="room_id" hidden name="room_id">
            </div>
            <button type="submit" id="submitBtn"
                class="bg-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-10 text-white py-3 mt-10 ">
                Pilih
            </button>
        </form>
    </section>
@endsection
