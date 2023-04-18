@extends('layout.master')

@section('master')
  <main class="flex h-full">
    <div class="relative w-3/5 md:flex flex-col justify-center hidden">
      <img src="{{ asset('img/auth-bg.png') }}" alt="auth-bg" class="max-h-screen w-full">
    </div>
    <div class="basis-full max-h-screen overflow-y-auto md:basis-5/6">
      <div class="flex flex-col justify-center items-center gap-12 py-10 px-5 md:px-0">
        @yield('authForm')
      </div>
    </div>
  </main>
@endsection
