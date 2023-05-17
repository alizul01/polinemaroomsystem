<h1>
  Hello, {{ Auth::user()->name }}, you are logged in!
  <a href="{{ route('logout') }}">Logout</a>
</h1>
