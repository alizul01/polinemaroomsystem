<section class="max-h-[30rem] flex flex-col gap-4 p-6 bg-white border-2 rounded-lg shadow-md">
    <h1 class="text-lg font-medium">Log Peminjaman</h1>
    <div
        class="relative overflow-auto scrollbar-thin scrollbar-thumb-rounded-lg scrollbar-thumb-gray-400 scrollbar-track-gray-100">
        <table class="w-full text-sm text-center">
            <thead class="text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ruangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Peminjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Organisasi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($log as $item)
                    <tr class="bg-white border-b">
                        <th class="px-6 py-4 font-normal text-gray-900 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->room->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->user->organization->name }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
