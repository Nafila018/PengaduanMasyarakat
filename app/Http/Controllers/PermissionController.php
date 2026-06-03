<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permission;

class PermissionController extends Controller
{
    // TAMPIL DATA
  public function index()
{
    // AMBIL SEMUA DATA PERMISSION
    $permission = Permission::all();

    // KIRIM KE VIEW
    return view('admin.permission.index', compact('permission'));
}

    // FORM TAMBAH
    
public function create()
{
    return view('admin.permission.create');
}
    

    // SIMPAN
   public function store(Request $request)
{
    // VALIDASI
    $request->validate([

        'nama_permission' => 'required|unique:permissions'

    ]);

    // SIMPAN PERMISSION
    Permission::create([

        'nama_permission' => $request->nama_permission

    ]);

    // REDIRECT
    return redirect('/admin/permission')
            ->with('success', 'Permission berhasil ditambahkan');
}

    // DETAIL
    public function show($id)
    {

    }

    // FORM EDIT
    public function edit($id)
{
    // AMBIL DATA PERMISSION BERDASARKAN ID
    $permission = Permission::findOrFail($id);

    // KIRIM KE VIEW
    return view('admin.permission.edit', compact('permission'));
}

    // UPDATE
   public function update(Request $request, $id)
{
    // AMBIL DATA PERMISSION
    $permission = Permission::findOrFail($id);

    // VALIDASI
    $request->validate([

        'nama_permission' => 'required|unique:permissions,nama_permission,' . $id

    ]);

    // UPDATE DATA
    $permission->update([

        'nama_permission' => $request->nama_permission

    ]);

    // REDIRECT
    return redirect('/admin/permission')
            ->with('success', 'Permission berhasil diupdate');
}

    // HAPUS
    public function destroy($id)
{
    // AMBIL DATA PERMISSION
    $permission = Permission::findOrFail($id);

    // HAPUS PERMISSION
    $permission->delete();

    // REDIRECT
    return redirect('/admin/permission')
            ->with('success', 'Permission berhasil dihapus');
}
}