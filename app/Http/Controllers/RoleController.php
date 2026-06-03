<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TAMPIL DATA ROLE
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $role = Role::with('permissions')->get();

        return view(
            'admin.role.index',
            compact('role')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH ROLE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $permission = Permission::all();

        return view(
            'admin.role.create',
            compact('permission')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN ROLE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([

            'nama_role' => 'required|unique:roles,nama_role'

        ]);

        // SIMPAN ROLE
        $role = Role::create([

            'nama_role' => $request->nama_role

        ]);

        // SIMPAN PERMISSION
        if ($request->permission)
        {
            $role->permissions()->attach(
                $request->permission
            );
        }

        return redirect('/admin/role')
                ->with(
                    'success',
                    'Role berhasil ditambahkan'
                );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL ROLE
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {

    }

    /*
    |--------------------------------------------------------------------------
    | FORM EDIT ROLE
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        // AMBIL ROLE
        $role = Role::findOrFail($id);

        // AMBIL SEMUA PERMISSION
        $permission = Permission::all();

        // AMBIL ID PERMISSION YANG SUDAH DIPILIH
        $rolePermission = $role->permissions
                               ->pluck('id')
                               ->toArray();

        return view(
            'admin.role.edit',
            compact(
                'role',
                'permission',
                'rolePermission'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE ROLE
    |--------------------------------------------------------------------------
    */
    public function update(
        Request $request,
        $id
    )
    {
        // AMBIL ROLE
        $role = Role::findOrFail($id);

        // VALIDASI
        $request->validate([

            'nama_role' =>
            'required|unique:roles,nama_role,' . $id

        ]);

        // UPDATE ROLE
        $role->update([

            'nama_role' => $request->nama_role

        ]);

        // UPDATE PERMISSION
        $role->permissions()->sync(
            $request->permission ?? []
        );

        return redirect('/admin/role')
                ->with(
                    'success',
                    'Role berhasil diupdate'
                );
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS ROLE
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        // AMBIL ROLE
        $role = Role::findOrFail($id);

        // HAPUS RELASI PERMISSION
        $role->permissions()->detach();

        // HAPUS ROLE
        $role->delete();

        return redirect('/admin/role')
                ->with(
                    'success',
                    'Role berhasil dihapus'
                );
    }
}

