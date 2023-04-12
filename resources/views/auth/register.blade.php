@extends('layout.master')

@section('master')
  <main class="flex flex-col justify-center items-center min-h-screen bg-[#252525] text-white gap-9">
    <img src="{{ asset('img/logo.svg') }}" alt="logo" class="w-28 h-24 mt-5">
    <div class="font-normal text-center text-lg">
      <h1>Login to</h1>
      <p>Polinema Room System</p>
    </div>
    <form action="" class="flex flex-col gap-6">
      <div></div>
      <label for="username" class="block mb-2 text-sm font-medium dark:text-white">Username</label>
      <input type="text" id="username" name="username"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-2.5 pr-36 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      </div>
      <div>
        <label for="password" class="block mb-2 text-sm font-medium">Password</label>
        <input type="password" id="password" name="password"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-2.5 pr-36 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required>
      </div>
      <button type="button"
        class="text-gray-900 bg-gray-100 font-medium rounded-lg py-3 my-5 text-center dark:focus:ring-gray-500 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
        Login
      </button>
    </form>
    <div class="text-center">
      <p>Dont have an account?</p>
      <a href="" class="underline underline-offset-4">Register Now</a>
    </div>
    <div class="text-center mb-5 max-w-sm">
      <p class="break-words">
        By clicking Register, you accept the terms and conditions of the Polinema Room System.
      </p>
    </div>
  </main>
@endsection
