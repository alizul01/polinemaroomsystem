@extends('layout.master')

@section('master')
    <main class="flex h-full">
        <div class="relative w-3/5 lg:flex flex-col justify-center hidden">
            <img src="{{ asset('img/auth-bg.png') }}" alt="auth-bg" class="h-screen w-full">
        </div>
        <div class="basis-full flex flex-col justify-center max-h-screen lg:basis-5/6">
            <div class="overflow-y-auto">
                <div class="flex flex-col justify-center items-center gap-12 p-10 lg:px-0">
                    @yield('authForm')
                </div>
            </div>
        </div>
    </main>
@endsection
