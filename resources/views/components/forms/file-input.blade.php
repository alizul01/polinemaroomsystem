<div>
  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="{{ $name }}">
    {{ $label }}
  </label>
  <input
    class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
    aria-describedby="{{ $name }}" id="{{ $name }}" name="{{ $name }}" type="file">
</div>
