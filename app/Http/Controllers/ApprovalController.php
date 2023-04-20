<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Http\Requests\StoreApprovalRequest;
use App\Http\Requests\UpdateApprovalRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApprovalController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request): Response
  {
    $approval = Approval::paginate(10);
    if ($request->has('search')) {
      $approval = Approval::where('name', 'like', '%' . $request->search . '%')->paginate(10);
      return response()->view('admin.pages.approval', compact('approval'));
    }
    return response()->view('admin.pages.approval');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): Response
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreApprovalRequest $request): RedirectResponse
  {
    $request->validated();
  }

  /**
   * Display the specified resource.
   */
  public function show(Approval $approval): Response
  {
    return response()->view('admin.pages.approval', compact('approval'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Approval $approval): Response
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateApprovalRequest $request, Approval $approval): RedirectResponse
  {
    $approval->update($request->validated());
    return redirect()->route('login');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Approval $approval): RedirectResponse
  {
    $approval->delete();

    toast('Approval deleted successfully', 'success');
    return redirect()->route('login');
  }
}
