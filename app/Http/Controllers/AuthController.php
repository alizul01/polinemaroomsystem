<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Organization;
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

  public function showLogin() {
    return view('auth.login');
  }

  public function showRegister() {
    $organizations = Organization::all();
    return view('auth.register', compact('organizations'));
  }

  public function login(LoginRequest $request)
  {
    $request->validated();
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      toast()->success('Login success');
      return redirect()->intended($this->redirectTo());
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }

  public function register(RegisterRequest $request)
  {
    $request->validated();
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'organization_id' => $request->organization_id,
      'nomor_telepon' => $request->phone_number,
      'nomor_induk' => $request->nomor_induk,
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
