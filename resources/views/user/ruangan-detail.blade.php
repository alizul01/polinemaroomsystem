@extends('layout.master')
@section('master')
  @include('user.partials.navbar')
  <main class="-mt-14 mb-10 px-10">
    <section class="flex flex-col grow gap-4 p-6 bg-white border-2 rounded-lg shadow-md mb-10">
      <div class="flex flex-col gap-9">
        <div class="flex gap-4 justify-center">
          <div class="">
            <img src="{{ asset('img/hero.png') }}" alt="" class="max-w-xl max-h-xl">
          </div>
          <div class="flex flex-col gap-4">
            <img src="{{ asset('img/gambar-1.png') }}" alt="" class="max-w-lg max-h-lg">
            <img src="{{ asset('img/gambar-2.png') }}" alt="" class="max-w-lg max-h-lg">
          </div>
          <div class="flex flex-col gap-4">
            <img src="{{ asset('img/gambar-1.png') }}" alt="" class="max-w-lg max-h-lg">
            <img src="{{ asset('img/gambar-2.png') }}" alt="" class="max-w-lg max-h-lg">
          </div>
        </div>
        <div class="flex gap-4">
          <button type="button"
            class="text-gray-900 bg-white border border-gray-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 cursor-default">
            Lantai 7
          </button>
          @if ($status == 'kosong')
            <button type="button"
              class="text-white bg-gray-900 border-gray-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 cursor-default">
              Kosong
            </button>
          @elseif($status == 'terpakai')
            <button type="button"
              class="text-gray-900 bg-yellow-400 border border-yellow-400 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 cursor-default">
              Terpakai
            </button>
          @endif

        </div>
        <div class="flex justify-between my-2">
          <h1 class="text-xl font-semibold my-auto">Ruangan Teori 3</h1>
          <button
            class="flex items-center gap-1 text-white bg-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-6 py-4">
            <i class="bx bx-plus text-lg"></i> Booking Ruangan
          </button>
        </div>
        <div class="flex gap-4">
          <div class="flex flex-col gap-6 border border-gray-400 rounded-md p-6">
            <span>Facilities</span>
            <div class="flex flex-col gap-10">
              <div class="flex gap-8">
                <div class="flex gap-3">
                  <div class="flex gap-6 max-w-xs">
                    <i class="bx bx-user"></i>
                    <div class="flex flex-col gap-2">
                      <span>Estimated Capacity</span>
                      <span class="font-medium">60 Pieces</span>
                    </div>
                  </div>
                </div>
                <div class="flex gap-3">
                  <div class="flex gap-6 max-w-xs">
                    <i class="bx bx-chair"></i>
                    <div class="flex flex-col gap-2">
                      <span>Chair</span>
                      <span class="font-medium">60 Pieces</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex justify-between">
                <div class="flex gap-3">
                  <div class="flex gap-6 max-w-xs">
                    <i class="bx bx-desktop"></i>
                    <div class="flex flex-col gap-2">
                      <span>Table</span>
                      <span class="font-medium">18 Pieces</span>
                    </div>
                  </div>
                </div>
                <div class="flex gap-3">
                  <div class="flex gap-6 max-w-xs">
                    <i class="bx bx-slideshow"></i>
                    <div class="flex flex-col gap-2">
                      <span>Projector</span>
                      <span class="font-medium">Available</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex justify-between">
                <div class="flex gap-3">
                  <div class="flex gap-6 max-w-xs">
                    <i class="bx bx-wind"></i>
                    <div class="flex flex-col gap-2">
                      <span>Air Conditioner</span>
                      <span class="font-medium">Available</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-1 flex-col gap-6 border border-gray-400 rounded-md p-6 max-h-screen">
            <span>Schedule</span>
            <div class="relative overflow-auto">
              <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-10">
                  <div class="flex justify-between bg-yellow-100 rounded-md py-2 px-4">
                    <div class="flex gap-2">
                      <span class="h-12 w-1.5 border border-black bg-black rounded-sm"></span>
                      <div class="flex flex-col">
                        <span>07.00 AM - 08.00</span>
                        <span>25 Juni 2023</span>
                      </div>
                    </div>
                    <span class="my-auto font-bold text-xl">
                      HMTI
                    </span>
                  </div>
                </div>
                <div class="flex flex-col gap-10">
                  <div class="flex justify-between bg-yellow-100 rounded-md py-2 px-4">
                    <div class="flex gap-2">
                      <span class="h-12 w-1.5 border border-black bg-black rounded-sm"></span>
                      <div class="flex flex-col">
                        <span>07.00 AM - 08.00</span>
                        <span>25 Juni 2023</span>
                      </div>
                    </div>
                    <span class="my-auto font-bold text-xl">
                      HMTI
                    </span>
                  </div>
                </div>
                <div class="flex flex-col gap-10">
                  <div class="flex justify-between bg-yellow-100 rounded-md py-2 px-4">
                    <div class="flex gap-2">
                      <span class="h-12 w-1.5 border border-black bg-black rounded-sm"></span>
                      <div class="flex flex-col">
                        <span>07.00 AM - 08.00</span>
                        <span>25 Juni 2023</span>
                      </div>
                    </div>
                    <span class="my-auto font-bold text-xl">
                      HMTI
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
