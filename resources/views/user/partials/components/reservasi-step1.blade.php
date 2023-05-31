<section class="flex flex-col grow p-6 bg-white border-2 rounded-lg shadow-md min-w-fit">
    <form class="flex flex-col gap-9">
        @csrf
        <div class="flex flex-col gap-4">
            <h1 class="text-xl font-medium">Data Peminjam</h1>
            <div class="flex gap-5">
                <div class="flex-1">
                    <label for="nama" class="block mb-2 text-sm text-gray-600">Nama Lengkap
                        <span class="text-red-600">*</span></label>
                    <input type="text" name="nama" id="nama" autocomplete="given-name" autofocus
                        class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex-1">
                    <label for="nim" class="block mb-2 text-sm text-gray-600">NIM/NIP
                        <span class="text-red-600">*</span></label>
                    <input type="text" name="nim" id="nim" autocomplete="given-nim"
                        class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
            <div class="flex gap-5">
                <div class="flex-1">
                    <label for="oki" class="block mb-2 text-sm text-gray-600">Asal UKM/OKI
                        <span class="text-red-600">*</span></label>
                    <select name="oki" id="oki"
                        class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label for="nim" class="block mb-2 text-sm text-gray-600">Nomor Telefon
                        <span class="text-red-600">*</span></label>
                    <input type="text" name="nim" id="nim" autocomplete="given-nim"
                        class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-4">
            <h1 class="text-xl font-medium">Data Peminjaman</h1>
            <div class="flex gap-5">
                <div class="flex-1">
                    <label for="tanggal" class="block mb-2 text-sm text-gray-600">Tanggal Peminjaman
                        <span class="text-red-600">*</span></label>
                    <input type="date" name="tanggal" id="tanggal" autocomplete="given-tanggal"
                        class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex-1">
                    <label for="jam-mulai" class="block mb-2 text-sm text-gray-600">Jam Mulai
                        <span class="text-red-600">*</span></label>
                    <input type="time" name="jam-mulai" id="jam-mulai" autocomplete="given-jam-mulai"
                        class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
            <div class="flex gap-5">
                <div class="flex-1">
                    <label for="jam-selesai" class="block mb-2 text-sm text-gray-600">Jam Selesai
                        <span class="text-red-600">*</span></label>
                    <input type="time" name="jam-selesai" id="jam-selesai" autocomplete="given-jam-selesai"
                        class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex-1">
                    <label for="orang" class="block mb-2 text-sm text-gray-600">Jumlah Orang</label>
                    <input type="number" name="orang" id="orang" autocomplete="given-orang"
                        class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-4">
            <h1 class="text-xl font-medium">Keterangan</h1>
            <div class="flex gap-5">
                <div class="flex-1">
                    <label for="oki" class="block mb-2 text-sm text-gray-600">Keterangan
                        Tambahan</label>
                    <textarea name="oki" id="oki" rows="4"
                        class="w-full py-3 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
            </div>
        </div>
        <div class="flex justify-between">
            <span>Keterangan: <span class="text-red-600">*</span> harus diisi</span>
            <button type="submit"
                class="flex gap-1 justify-center items-center text-white bg-gray-700 font-medium rounded-lg p-3 text-center hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-100">
                Lanjutkan<i class="bx bx-right-arrow-alt text-xl"></i>
            </button>
        </div>
    </form>
</section>
