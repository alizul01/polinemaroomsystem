@extends('layout.master')
@section('master')
  @include('admin.partials.navbar')
  <main class="-mt-14 mb-10 px-10">
    <section class="flex flex-col grow gap-4 p-6 bg-white border-2 rounded-lg shadow-md mb-10">
      <div class="flex justify-between items-center">
        <h1 class="font-semibold text-lg">Peminjaman</h1>
        <div class="flex items-center">
          <input id="link-checkbox" type="checkbox" value=""
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
          <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900">
            Sertakan peminjaman yang sudah selesai
          </label>
        </div>
      </div>
      <span>Peminjaman Dalam Proses ACC dan Selesai ACC</span>
      <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-1 text-center py-3">
                No
              </th>
              <th scope="col" class="px-6 py-3">
                Tanggal Diajukuan
              </th>
              <th scope="col" class="px-6 py-3">
                Ruangan
              </th>
              <th scope="col" class="px-6 py-3">
                Tanggal Dipakai
              </th>
              <th scope="col" class="px-6 py-3">
                Val.Bem
              </th>
              <th scope="col" class="px-6 py-3">
                Val.Kaprodi
              </th>
              <th scope="col" class="px-6 py-3">
                Val.KaJur
              </th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-white border-b">
              <td class="px-1 text-center py-4">
                1
              </td>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                23 Mei 2023
              </th>
              <td class="px-6 py-4">
                LPY 3
              </td>
              <td class="px-6 py-4">
                25 Mei 2023
              </td>
              <td class="px-6 py-4">
                <button type="button"
                  class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                  Validasi
                </button>
              </td>
              <td class="px-6 py-4">
                <button type="button"
                  class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5">
                  Dalam Proses
                </button>
              </td>
              <td class="px-6 py-4">
                <button type="button"
                  class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                  Ditolak
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </main>
@endsection
