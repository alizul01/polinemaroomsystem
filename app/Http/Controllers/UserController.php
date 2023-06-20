<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::paginate(5);
    return view('user.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('user.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUserRequest $request)
  {
    User::create($request->validated());
    toast()->success('User created successfully')->timerProgressBar();
    return redirect()->route('user.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return view('user.show', compact('user'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    if ($user->role == 'superadmin') {
      toast()->error('You are not allowed to edit superadmin')->timerProgressBar();
      return redirect()->route('user.index');
    }

    if ($user->isAdmin()) {
      toast()->error('You are not allowed to edit admin')->timerProgressBar();
      return redirect()->route('user.index');
    }
    return view('user.edit', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateUserRequest $request, User $user)
  {
    if ($user->role == 'superadmin') {
      toast()->error('You are not allowed to update superadmin')->timerProgressBar();
      return redirect()->route('user.index');
    }

    if ($user->isAdmin()) {
      toast()->error('You are not allowed to update admin')->timerProgressBar();
      return redirect()->route('user.index');
    }

    $user->update($request->validated());
    toast()->success('User updated successfully')->timerProgressBar();
    return redirect()->route('user.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    if ($user->role == 'superadmin') {
      toast()->error('You are not allowed to delete superadmin')->timerProgressBar();
      return redirect()->route('user.index');
    }

    if ($user->isAdmin()) {
      toast()->error('You are not allowed to delete admin')->timerProgressBar();
      return redirect()->route('user.index');
    }

    $user->delete();
    toast()->success('User deleted successfully')->timerProgressBar();
    return redirect()->route('user.index');
  }
}
