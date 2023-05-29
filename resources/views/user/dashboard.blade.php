@extends('layout.master')
@section('master')
    @include('user.partials.navbar')
    <main class="flex gap-6 mt-20 mb-10 px-10">
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
            <div class="grid grid-cols-3 gap-4">
                @foreach ($rooms as $room)
                    <x-dashboard.card-room status="kosong" :name="$room->name" :image="$room->image" :capacity="$room->capacity" :code="$room->code" :floor="$room->floor" />
                @endforeach
            </div>
        </section>
        <aside class="flex flex-col shrink gap-6">
            @include('user.partials.components.status-peminjaman')
            @include('user.partials.components.log-peminjaman')
        </aside>
    </main>
@endsection
