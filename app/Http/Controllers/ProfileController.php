<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('auth.profile');
  }

  public function update(Request $request)
  {
    $user = Auth::user();

    // Validate the request...
    $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'current_password' => [
        'required_with:password',
        function ($attribute, $value, $fail) use ($user) {
          if (!Hash::check($value, $user->password)) {
            return $fail(__('The current password is incorrect.'));
          }
        }
      ],
      'password' => 'confirmed'
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->password) {
      $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully');
  }
}