@php
    $getColorState = function ($approvalStatus) {
        switch ($approvalStatus) {
            case true:
                return 'bg-green-500';
            case null:
                return 'bg-yellow-500';
            case false:
                return 'bg-red-500';
            default:
                return 'bg-yellow-500';
        }
    };

    $colorState1 = $getColorState($isStepOneApproved);
    $colorState2 = $getColorState($isStepTwoApproved);
    $colorState3 = $getColorState($isStepThreeApproved);
    $colorState4 = $getColorState($isStepFourApproved);
@endphp



<tr class="bg-white border-b">
    <td class="px-6 py-4">
        {{ $no }}
    </td>
    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
        {{ \Carbon\Carbon::parse($dateFiled)->format('d F Y') }}
    </th>
    <td class="px-6 py-4">
        {{ $room->name }}
    </td>
    <td class="px-6 py-4">
        {{ \Carbon\Carbon::parse($dateUse)->format('d F Y') }}
    </td>
    <td class="px-6 py-4" id="status-{{ $id }}">
        @if ($status == 'Pending' || $status == 'Pending')
            <button type="button" disabled
                class="focus:outline-none bg-yellow-400 text-white  font-medium rounded-lg text-sm p-2">
                {{ $status }}
            </button>
        @elseif ($status == 'Approved' || $status == 'Approved')
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
                <button type="button" class="font-medium text-gray-500" id="accordion-collapse-button"
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
                                        <p class="font-light ">
                                            {{ $approvedAtOne ? \Carbon\Carbon::parse($approvedAtOne)->format('d F Y') : 'On Progress' }}
                                        </p>
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
                                        {{ $approvedAtTwo ? \Carbon\Carbon::parse($approvedAtTwo)->format('d F Y') : 'On Progress' }}
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
                                        {{ $approvedAtThree ? \Carbon\Carbon::parse($approvedAtThree)->format('d F Y') : 'On Progress' }}
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </h3>
                        </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div
                                class="z-10 text-white flex items-center justify-center w-12 h-12 {{ $status == 'Approved' ? 'bg-green-500' : 'bg-yellow-500' }} rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                @if ($status == 'Approved')
                                    <form id="status-download-{{ $id }}"
                                        action="/report-pdf" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit">
                                            <i class="bx bx-cloud-download text-2xl"></i>
                                        </button>
                                    </form>
                                @else
                                    <i class="bx bx-cloud-download text-2xl"></i>
                                @endif
                            </div>
                        </div>
                        <div class="mt-3">
                            <h3 class="italic text-gray-900">
                                <div class="cursor-default">
                                    Download
                                </div>
                            </h3>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </td>
</tr>
