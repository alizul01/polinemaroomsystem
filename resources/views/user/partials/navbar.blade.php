<header class="bg-gray-700 text-white flex flex-col gap-5 py-4 px-10">
  <div class="flex justify-between items-center">
    <img src="{{ asset('img/logo-navbar.svg') }}" alt="">
    <div class="flex items-center gap-6">
      <a href="" class="no-underline">
        <i class="bx bx-bell text-xl"></i>
      </a>
      <a href="" class="no-underline">
        <img src="{{ asset('img/profile-picture.png') }}" alt="">
      </a>
    </div>
  </div>
  <hr>
  <nav class="mb-5">
    <div class="flex lg:flex-row flex-col gap-4 justify-between {{ $isHome ? 'mb-16' : 'mb-[2.6rem]' }}">
      <ul class="flex my-auto justify-between md:justify-start md:gap-10">
        <li>
          <a href="/dashboard"
            class="no-underline {{ $active == 'home' ? 'text-white' : 'text-white/40 hover:text-white' }}">
            <span>Home</span>
          </a>
        </li>
        <li>
          <a href="/ruangan"
            class="no-underline {{ $active == 'ruangan' ? 'text-white' : 'text-white/40 hover:text-white' }}">
            <span>Ruangan</span>
          </a>
        </li>
        <li>
          <a href="/reservasi"
            class="no-underline {{ $active == 'reservasi' ? 'text-white' : 'text-white/40 hover:text-white' }}">
            <span>Reservasi</span>
          </a>
        </li>
        <li>
          <a href="/proses"
            class="no-underline {{ $active == 'proses' ? 'text-white' : 'text-white/40 hover:text-white' }}">
            <span>Proses</span>
          </a>
        </li>
      </ul>
      <form class="flex lg:w-4/12">
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
    </div>
  </nav>
  @if ($isHome)
    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-4 -my-20">
      <div class="flex gap-4 p-6 bg-white border rounded-lg shadow-md">
        <img src="{{ asset('img/logo-total.svg') }}" alt="logo-total">
        <div class="flex flex-col gap-3 my-auto">
          <p class="font-bold text-black">
            1024 Ruangan
          </p>
          <p class="font-normal text-black">
            Total Jumlah Ruangan
          </p>
        </div>
      </div>
      <div class="flex gap-4 p-6 bg-white border rounded-lg shadow-md">
        <img src="{{ asset('img/logo-terpakai.svg') }}" alt="logo-total">
        <div class="flex flex-col gap-3 my-auto">
          <p class="font-bold text-black">
            1024 Ruangan
          </p>
          <p class="font-normal text-black">
            Total Ruangan Terpakai
          </p>
        </div>
      </div>
      <div class="flex gap-4 p-6 bg-white border rounded-lg shadow-md">
        <img src="{{ asset('img/logo-kosong.svg') }}" alt="logo-total">
        <div class="flex flex-col gap-3 my-auto">
          <p class="font-bold text-black">
            1024 Ruangan
          </p>
          <p class="font-normal text-black">
            Total Ruangan Kosong
          </p>
        </div>
      </div>
      <button class="p-6 bg-gray-800 rounded-lg hover:bg-gray-900">
        <span class="text-2xl font-semibold">Buat Peminjaman <i class="bx bx-right-arrow-alt"></i></span>
      </button>
    </div>
  @else
  @endif
</header>
