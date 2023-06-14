<button id="lantaiDropdown" data-dropdown-toggle="dropdown"
  class="text-white bg-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-4 py-3 text-center inline-flex items-center"
  type="button">Lantai
  <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
    xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
  </svg>
</button>
<!-- Dropdown menu -->
<div id="dropdown"
  class="z-10 hidden bg-black divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
  <form method="GET">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="lantaiDropdown">
      <li class="hover:bg-gray-800">
        <button type="submit" name="" value="" class="block px-4 py-2 text-white">Semua
          Lantai</button>
      </li>
      <li class="hover:bg-gray-800">
        <button type="submit" name="floor" value="1" class="block px-4 py-2 text-white">Lantai
          1</button>
      </li>
      <li class="hover:bg-gray-800">
        <button type="submit" name="floor" value="2" class="block px-4 py-2 text-white">Lantai
          2</button>
      </li>
      <li class="hover:bg-gray-800">
        <button type="submit" name="floor" value="3" class="block px-4 py-2 text-white">Lantai
          3</button>
      </li>
    </ul>
  </form>
</div>
