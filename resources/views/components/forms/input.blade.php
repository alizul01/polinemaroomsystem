<div>
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium">{{ $label }}</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            @if ($icon == 'email')
                <i class="bx bx-envelope text-xl text-gray-500"></i>
            @elseif($icon == 'password')
                <i class="bx bx-lock-alt text-xl text-gray-500"></i>
            @elseif($icon == 'user')
                <i class="bx bx-user text-xl text-gray-500"></i>
            @endif
        </div>
        @if ($autofocus == 'true')
            <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
                class="w-full py-3 pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                placeholder="{{ $placeholder }}" value="{{ old($name) }}" autofocus />
        @else
            <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
                class="w-full py-3 pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                placeholder="{{ $placeholder }}" value="{{ old($name) }}" />
        @endif
    </div>

    @error($name)
        <p class="mt-2 text-sm text-red-500" cy-data="error-{{ $name }}">{{ $message }}</p>
    @enderror
</div>
