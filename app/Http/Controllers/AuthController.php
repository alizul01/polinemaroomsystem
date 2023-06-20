<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  protected function redirectTo()
  {
    if (auth()->user()->role == 'superadmin') {
      return '/admin';
    }
    return '/';
  }

  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      toast()->success('Login success');
      return redirect()->intended($this->redirectTo());
    } else {
      return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
      ]);
    }
  }


  public function register(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:8|confirmed',
      'password_confirmation' => 'required|string|min:8',
      // 'identity' => 'required|file|mimes:jpg,png,jpeg|max:2048',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      // 'identity' => $request->file('identity')->store('public/identity'),
    ]);

    toast()->success('Register success');
    return redirect()->route('login');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    toast()->success('Logout success');
    return redirect()->route('login');
  }
}
