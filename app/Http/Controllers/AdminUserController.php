<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // TAMPIL DATA USER
   public function index(Request $request)
{
    $search = $request->search;

  $users = User::where('name', 'like', '%' . $search . '%')
            ->paginate(5)
            ->withQueryString();

return view('admin.user.index', compact('users'));
}

    // FORM TAMBAH USER
    public function create()
    {
        return view('admin.user.create');
    }

    // SIMPAN USER
   public function store(Request $request)
{
    // VALIDASI
    $request->validate([

        'name' => 'required',

        'email' => 'required|email|unique:users',

        'password' => 'required|min:6',

        'role' => 'required'

    ]);

    // SIMPAN USER
    User::create([

        'name' => $request->name,

        'email' => $request->email,

        'password' => Hash::make($request->password),

        'role' => $request->role

    ]);

    // REDIRECT
    return redirect('/admin/user')
            ->with('success', 'User berhasil ditambahkan');
}

    // FORM EDIT USER
   public function edit($id)
{
    // AMBIL DATA USER BERDASARKAN ID
    $user = User::findOrFail($id);

    // KIRIM KE VIEW
    return view('admin.user.edit', compact('user'));
}

    // UPDATE USER
   public function update(Request $request, $id)
{
    // AMBIL DATA USER
    $user = User::findOrFail($id);

    // VALIDASI
    $request->validate([

        'name' => 'required',

        'email' => 'required|email|unique:users,email,' . $id,

        'role' => 'required'

    ]);

    // JIKA PASSWORD DIISI
    if($request->password)
    {
        $password = Hash::make($request->password);
    }

    // JIKA PASSWORD KOSONG
    else
    {
        $password = $user->password;
    }

    // UPDATE DATA
    $user->update([

        'name' => $request->name,

        'email' => $request->email,

        'password' => $password,

        'role' => $request->role

    ]);

    // REDIRECT
    return redirect('/admin/user')
            ->with('success', 'User berhasil diupdate');
}

    // HAPUS USER
   public function destroy($id)
{
    // AMBIL DATA USER
    $user = User::findOrFail($id);

    // HAPUS USER
    $user->delete();

    // REDIRECT
    return redirect('/admin/user')
            ->with('success', 'User berhasil dihapus');
}
}