<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN FORM
    |--------------------------------------------------------------------------
    */
    public function login()
    {
        // jika sudah login
        if (Auth::check()) {

            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->role == 'masyarakat') {
                return redirect()->route('masyarakat.dashboard');
            }

            if (Auth::user()->role == 'camat') {
                return redirect()->route('camat.dashboard');
            }
        }

        return view('auth.login');
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN PROSES
    |--------------------------------------------------------------------------
    */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // remember login
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {

            // regenerate session
            $request->session()->regenerate();

            // role admin
            if (Auth::user()->role == 'admin') {

                return redirect()
                    ->route('admin.dashboard')
                    ->with('success', 'Login berhasil');
            }

            // role masyarakat
            if (Auth::user()->role == 'masyarakat') {

                return redirect()
                    ->route('masyarakat.dashboard')
                    ->with('success', 'Login berhasil');
            }

            // role camat
            if (Auth::user()->role == 'camat') {

                return redirect()
                    ->route('camat.dashboard')
                    ->with('success', 'Login berhasil');
            }
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.'
            ])
            ->onlyInput('email');
    }


    /*
    |--------------------------------------------------------------------------
    | REGISTER PROSES
    |--------------------------------------------------------------------------
    */
    public function storeRegister(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6|confirmed'

        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => 'masyarakat'

        ]);

        return redirect('/login')
                ->with(
                    'success',
                    'Registrasi berhasil'
                );
    }


    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    public function profile()
    {
        return view(
            'masyarakat.profile',
            [
                'user' => Auth::user()
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE PROFILE
    |--------------------------------------------------------------------------
    */
    public function updateProfile(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email',

            'alamat' => 'nullable',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO BARU
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($user->foto) {

                $oldPath = public_path(
                    'storage/' . $user->foto
                );

                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // upload foto baru
            $foto = $request->file('foto')
                            ->store(
                                'profile',
                                'public'
                            );

            // simpan database
            $user->foto = $foto;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA USER
        |--------------------------------------------------------------------------
        */
        $user->name = $request->name;

        $user->email = $request->email;

        $user->alamat = $request->alamat;

        $user->save();

        return back()->with(
            'success',
            'Profile berhasil diperbarui'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    public function logout(Request $request)
    {
        Auth::logout();

        // hapus session
        $request->session()->invalidate();

        // regenerate token
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
