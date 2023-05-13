<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.svg') }}">
  <title>Polarys | Polinema Room System</title>

  {{-- Link Font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  {{-- Link Icon --}}
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  {{-- Link Css & Js --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">
  @include('sweetalert::alert')
  @yield('master')
</body>

</html>
