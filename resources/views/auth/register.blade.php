@extends('layout.auth')

@section('authForm')
    <div class="flex gap-6">
        <img src="{{ asset('img/logo-polinema.svg') }}" alt="logo-polarys">
        <img src="{{ asset('img/logo-dark.svg') }}" alt="logo-polarys">
    </div>
    <div class="text-center">
        <h1 class="text-3xl font-semibold text-gray-800">Register your account</h1>
    </div>
    <form method="POST" class="flex flex-col gap-7 md:w-1/2 w-full" enctype="multipart/form-data">
        @csrf
        <x-forms.input type="text" name="name" label="Full Name" placeholder="John Doe" icon="user"
            autofocus="true" />
        <x-forms.input type="email" name="email" label="Email Address" placeholder="name@mail.com" icon="email"
            autofocus="false" />
        <x-forms.input type="password" name="password" label="Password" placeholder="********" icon="password"
            autofocus="false" />
        <x-forms.input type="password" name="password_confirmation" label="Confirm Password" placeholder="********"
            icon="password" autofocus="false" />
        <x-forms.input type="text" name="phone_number" label="Phone Number" placeholder="08xxxxxxxxxx" icon="phone"
            autofocus="false" />
        <x-forms.input type="text" name="nomor_induk" label="Nomor Induk" placeholder="xxxxxxxxxx" icon="nomor_induk"
            autofocus="false" />
        <select name="organization_id" id="organization_id"
            class="rounded-lg p-3 text-center focus:ring-4 focus:outline-none focus:ring-gray-100">
            <option value="" disabled selected>Select Organization</option>
            @foreach ($organizations as $organization)
                <option value="{{ $organization->id }}">{{ $organization->name }}</option>
            @endforeach
        </select>

        <button type="submit" id="register"
            class="text-white bg-gray-700 font-medium rounded-lg p-3 text-center hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-100">
            Register
        </button>

    </form>
    <div class="flex flex-col gap-1 text-center">
        <p>Already have an account?</p>
        <a href="/login" class="underline underline-offset-4 hover:text-gray-700">Login Now</a>
    </div>
@endsection
