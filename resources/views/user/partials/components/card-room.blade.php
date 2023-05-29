<div
  class="flex flex-col gap-5 max-w-sm p-6 bg-white border border-gray-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
  <div>
    @if ($status == 'kosong')
      <div
        class="absolute p-2 text-white bg-gray-900 font-medium text-sm rounded-br-lg rounded-tl-lg hover:cursor-default">
        <span>Kosong</span>
      </div>
    @elseif($status == 'terpakai')
      <div
        class="absolute p-2 text-black bg-yellow-400 font-medium text-sm  rounded-br-lg rounded-tl-lg hover:cursor-default">
        <span>Terpakai</span>
      </div>
    @endif
    <img src="{{ asset($image) }}" alt="{{ $code }}" class="w-full rounded-lg">
  </div>
  <h5 class="text-xl font-medium tracking-tight text-gray-900">
    {{ $name }}
  </h5>
  <hr>
  <div class="flex flex-col gap-2 text-gray-700">
    @if ($status == 'kosong')
      <span>Status : <span class="font-bold">Kosong</span></span>
    @elseif($status == 'terpakai')
      <span>Status : <span class="font-bold">Dipakai</span></span>
    @endif
    <span>Kapasitas : {{ $capacity }} Orang</span>
  </div>
  <div class="flex flex-col gap-2">
    @if ($status == 'kosong')
      <button class="text-white bg-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-5 py-3">
        Booking Ruangan
      </button>
    @elseif($status == 'terpakai')
      <button class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-3 cursor-not-allowed">
        Booking Ruangan
      </button>
    @endif
    <a href="{{ $code }}"
      class="text-gray-900 hover:text-white border border-gray-600 hover:bg-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center no-underline">
      Lihat Detail Ruangan
    </a>
  </div>
</div>
