@php
    $colorState1 = 'bg-gray-500';
    $colorState2 = 'bg-gray-500';
    $colorState3 = 'bg-gray-500';
    $colorState4 = 'bg-gray-500';
    switch ($issteponeapproved) {
        case 'yes':
            $colorState1 = 'bg-green-500';
            break;
        case 'no':
            $colorState1 = 'bg-red-500';
            break;
        default:
            $colorState1 = 'bg-yellow-500';
            break;
    }
    switch ($isStep2Approved) {
        case 'yes':
            $colorState2 = 'bg-green-500';
            break;
        case 'no':
            $colorState2 = 'bg-red-500';
            break;
        default:
            $colorState2 = 'bg-gray-500';
            break;
    }
    switch ($isStep3Approved) {
        case 'yes':
            $colorState3 = 'bg-green-500';
            break;
        case 'no':
            $colorState3 = 'bg-red-500';
            break;
        default:
            $colorState3 = 'bg-gray-500';
            break;
    }
    switch ($isStep4Approved) {
        case 'yes':
            $colorState4 = 'bg-green-500';
            break;
        case 'no':
            $colorState4 = 'bg-red-500';
            break;
        default:
            $colorState4 = 'bg-gray-500';
            break;
    }
@endphp
<tr class="bg-white border-b">
    <td class="px-6 py-4">
        {{ $no }}
    </td>
    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
        {{ $dateFiled }}
    </th>
    <td class="px-6 py-4">
        {{ $room }}
    </td>
    <td class="px-6 py-4">
        {{ $dateUse }}
    </td>
    <td class="px-6 py-4">
        @if ($status == 'Proses' || $status == 'proses')
            <button type="button" disabled
                class="focus:outline-none bg-yellow-400 text-white  font-medium rounded-lg text-sm p-2">
                {{ $status }}
            </button>
        @elseif ($status == 'Sukses' || $status == 'sukses')
            <button type="button" disabled
                class="focus:outline-none bg-green-500 text-white  font-medium rounded-lg text-sm p-2">
                {{ $status }}
            </button>
        @else
            <button type="button" disabled
                class="focus:outline-none bg-red-500 text-white  font-medium rounded-lg text-sm p-2">
                {{ $status }}
            </button>
        @endif
    </td>
    <td class="px-6 py-4">
        <div id="accordion-collapse" data-accordion="collapse">
            <span id="accordion-collapse-heading-{{ $id }}">
                <button type="button" class="font-medium text-gray-500"
                    data-accordion-target="#accordion-collapse-{{ $id }}" aria-expanded="false"
                    aria-controls="accordion-collapse-{{ $id }}">
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </span>
        </div>
    </td>
</tr>
<tr class="text-left border-none">
    <td colspan="6">
        <div id="accordion-collapse-{{ $id }}" class="hidden"
            aria-labelledby="accordion-collapse-heading-{{ $id }}" class="overflow-x-hidden">
            <div class="flex flex-col gap-4 px-8 py-4">
                <span class="font-medium px-4">Status Surat</span>
                <ol class="items-center sm:flex justify-center overflow-hidden">
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex justify-center items-center">
                            <div
                                class="z-10 text-white flex items-center justify-center w-12 h-12 {{ $colorState1 }} rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                1
                            </div>
                            <div class="hidden sm:flex w-full {{ $colorState1 }} h-0.5"></div>
                        </div>
                        <div class="mt-3 pr-72">
                            <h3 class="italic text-gray-900">
                                <div data-popover-target="popover-1-{{ $id }}" data-popover-placement="right"
                                    class="cursor-default">
                                    Tahap 1 <i class="bx bx-question-mark rounded-full border border-black"></i>
                                </div>
                                <div data-popover id="popover-1-{{ $id }}" role="tooltip"
                                    class="absolute z-20 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                                    <div class="px-3 py-2 {{ $colorState1 }} border-b border-gray-200 rounded-t-lg">
                                        <h3 class="font-semibold text-gray-50">Birokrasi Tahap Satu
                                        </h3>
                                    </div>
                                    <div class="px-3 py-2">
                                        <p class="font-light ">{{ $reasonone }}</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </h3>
                        </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div
                                class="z-10 text-white flex items-center justify-center w-12 h-12 {{ $colorState2 }} rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                2
                            </div>
                            <div class="hidden sm:flex w-full {{ $colorState2 }} h-0.5"></div>
                        </div>
                        <div class="mt-3 pr-72">
                            <h3 class="italic text-gray-900">
                                <div data-popover-target="popover-2-{{ $id }}" data-popover-placement="right"
                                    class="cursor-default">
                                    Tahap 2 <i class="bx bx-question-mark rounded-full border border-black"></i>
                                </div>
                                <div data-popover id="popover-2-{{ $id }}" role="tooltip"
                                    class="absolute z-20 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                                    <div class="px-3 py-2 {{ $colorState2 }} border-b border-gray-200 rounded-t-lg">
                                        <h3 class="font-semibold text-gray-50">Birokrasi Tahap Dua
                                        </h3>
                                    </div>
                                    <div class="px-3 py-2">
                                        <p class="font-light">{{ $reasontwo }}</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </h3>
                        </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div
                                class="z-10 text-white flex items-center justify-center w-12 h-12 {{ $colorState3 }} rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                3
                            </div>
                            <div class="hidden sm:flex w-full {{ $colorState3 }} h-0.5"></div>
                        </div>
                        <div class="mt-3 pr-72">
                            <h3 class="italic text-gray-900">
                                <div data-popover-target="popover-3-{{ $id }}" data-popover-placement="right"
                                    class="cursor-default">
                                    Tahap 3 <i class="bx bx-question-mark rounded-full border border-black"></i>
                                </div>
                                <div data-popover id="popover-3-{{ $id }}" role="tooltip"
                                    class="absolute z-20 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                                    <div class="px-3 py-2 {{ $colorState3 }} border-b border-gray-200 rounded-t-lg">
                                        <h3 class="font-semibold text-gray-50">Birokrasi Tahap Tiga
                                        </h3>
                                    </div>
                                    <div class="px-3 py-2">
                                        <p class="font-light">{{ $reasonthree }}</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </h3>
                        </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div
                                class="z-10 text-white flex items-center justify-center w-12 h-12 {{ $colorState4 }} rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                4
                            </div>
                        </div>
                        <div class="mt-3">
                            <h3 class="italic text-gray-900">
                                <div data-popover-target="popover-4-{{ $id }}" data-popover-placement="right"
                                    class="cursor-default">
                                    Tahap 4 <i class="bx bx-question-mark rounded-full border border-black"></i>
                                </div>
                                <div data-popover id="popover-4-{{ $id }}" role="tooltip"
                                    class="absolute z-20 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                                    <div class="px-3 py-2 {{ $colorState4 }} border-b border-gray-200 rounded-t-lg">
                                        <h3 class="font-semibold text-gray-50">Birokrasi Tahap Empat
                                        </h3>
                                    </div>
                                    <div class="px-3 py-2">
                                        <p class="font-light">{{ $reasonfour }}</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </h3>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </td>
</tr>
