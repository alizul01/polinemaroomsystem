@extends('layout.auth')

@section('authForm')
  <div class="flex gap-6">
    <img src="{{ asset('img/logo-polinema.svg') }}" alt="logo-polarys">
    <img src="{{ asset('img/logo-dark.svg') }}" alt="logo-polarys">
  </div>
  <div class="flex flex-col gap-2 text-center">
    <h1 class="text-3xl font-semibold text-gray-800">Login to your account</h1>
    <p class="text-lg text-gray-500">or login as admin</p>
  </div>
  <form action="" class="flex flex-col gap-7 md:w-1/2 w-full">
    <x-forms.input type="email" name="email" label="Email Address" placeholder="name@mail.com"
      icon="email" />
    <x-forms.input type="password" name="password" label="Password" placeholder="********" icon="password" />

    <div class="flex justify-end">
      <a href="/forgot-password" class="w-fit hover:text-gray-700">Forgot your password?</a>
    </div>
    <x-button text="Login" />
  </form>
  <div class="flex flex-col gap-1 text-center">
    <p>Dont have an account?</p>
    <a href="/register" class="underline underline-offset-4 hover:text-gray-700">Register Now</a>
  </div>
@endsection
