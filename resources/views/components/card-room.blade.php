<div
    class="flex flex-col gap-5 max-w-sm p-4 bg-white border border-gray-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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
    <div class="max-h-10 mt-5 flex flex-col gap-3">
        <h5 class="text-xl font-medium tracking-tight text-gray-900">
            {{ $name }}
        </h5>
    </div>
    <div class="flex flex-col gap-2 text-gray-700 border-t-2 pt-2">
        @if ($status == 'kosong')
            <span>Status : <span class="font-bold">Kosong</span></span>
        @elseif($status == 'terpakai')
            <span>Status : <span class="font-bold">Dipakai</span></span>
        @endif
        <span>Kapasitas : {{ $capacity }} Orang</span>
    </div>
    <div class="flex flex-col gap-2">
        @if ($isreservation)
            @if ($status == 'kosong')
                <button id="bookBtn{{ $id }}"
                    class="bookBtn text-white bg-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-5 py-3">
                    Booking Ruangan
                </button>
            @elseif($status == 'terpakai')
                <button class="text-white bg-gray-800 font-medium rounded-lg text-sm px-5 py-3 cursor-not-allowed">
                    Booking Ruangan
                </button>
            @endif
        @endif
        <a href="{{ route('room.show-user', $room) }}"
            class="text-gray-900 hover:text-white border border-gray-600 hover:bg-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center no-underline">
            Lihat Detail Ruangan
        </a>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let bookingButtons = document.querySelectorAll('.bookBtn');
        let selectedButton = null;

        bookingButtons.forEach((button) => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const input = document.getElementById('room_id');

                if (button === selectedButton) {
                    // The button was already selected. Deselect it and re-enable all buttons.
                    button.classList.remove('bg-green-500');
                    button.classList.add('bg-gray-400');
                    button.disabled = true;
                    bookingButtons.forEach((btn) => {
                        btn.disabled = false;
                        btn.classList.remove('bg-gray-400');
                        btn.classList.add('bg-gray-800');
                    });
                    selectedButton = null;
                    input.value = '';
                } else {
                    // A new button was selected. Disable all other buttons.
                    bookingButtons.forEach((btn) => {
                        if (btn !== button) {
                            btn.disabled = true;
                            btn.classList.remove('bg-green-500');
                            btn.classList.add('bg-gray-400');
                        }
                    });

                    // Select the clicked button.
                    button.disabled = false;
                    button.classList.remove('bg-gray-800');
                    button.classList.add('bg-green-500');
                    selectedButton = button;
                    input.value = button.id.replace('bookBtn', '');

                    if (selectedButton) {
                        bookingButtons.forEach((btn) => {
                            if (btn !== selectedButton) {
                                btn.classList.remove('bg-gray-800', 'bg-yellow-400',
                                    'hover:bg-green-500',
                                    'hover:bg-gray-900');
                                btn.classList.add('bg-gray-400');
                                btn.disabled = true;
                            }
                        });
                    }
                }
            });

            button.addEventListener('mouseover', function() {
                if (button !== selectedButton) {
                    button.classList.remove('bg-gray-800');
                    button.classList.add('hover:bg-green-500');
                }
            });

            button.addEventListener('mouseout', function() {
                if (button !== selectedButton) {
                    button.classList.remove('hover:bg-green-500');
                    button.classList.add('bg-gray-800');
                }
            });
        });
    });
</script>
