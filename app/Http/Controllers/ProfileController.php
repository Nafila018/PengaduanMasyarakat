<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profile
     */
    public function index()
    {
        return view('masyarakat.profile');
    }

    /**
     * Update profile
     */
   
public function update(Request $request)
{
    $request->validate([
        'name'   => 'required',
        'email'  => 'required|email',
        'alamat' => 'nullable',
    ]);

    $user = Auth::user();

    $user->update([
        'name'   => $request->name,
        'email'  => $request->email,
        'alamat' => $request->alamat,
    ]);

    return back()->with(
        'success',
        'Profile berhasil diperbarui!'
    );
}

}