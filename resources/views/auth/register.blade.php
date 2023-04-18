@extends('layout.auth')

@section('authForm')
  <div class="flex gap-6">
    <img src="{{ asset('img/logo-polinema.svg') }}" alt="logo-polarys">
    <img src="{{ asset('img/logo-dark.svg') }}" alt="logo-polarys">
  </div>
  <div class="text-center">
    <h1 class="text-3xl font-semibold text-gray-800">Register your account</h1>
  </div>
  <form action="" class="flex flex-col gap-7 md:w-1/2 w-full">
    <div>
      <label for="email" class="block mb-2 text-sm font-medium dark:text-white">Email Address</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-5 h-5 text-gray-500">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
          </svg>
        </div>
        <input type="email" id="email" name="email"
          class="w-full py-3 pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
          placeholder="name@mail.com">
      </div>
    </div>
    <div>
      <label for="password" class="block mb-2 text-sm font-medium dark:text-white">Password</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-5 h-5 text-gray-500">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
          </svg>
        </div>
        <input type="password" id="password" name="password"
          class="w-full py-3 pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
          placeholder="password">
      </div>
    </div>
    <div>
      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="identity">Identity
        File</label>
      <input
        class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
        aria-describedby="identity_help" id="identity" type="file">
    </div>
    <button type="button"
      class="text-white bg-gray-700 font-medium rounded-lg py-3 text-center dark:focus:ring-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-100">
      Register
    </button>
  </form>
  <div class="flex flex-col gap-1 text-center">
    <p>Already have an account?</p>
    <a href="/login" class="underline underline-offset-4 hover:text-gray-700">Login Now</a>
  </div>
@endsection
