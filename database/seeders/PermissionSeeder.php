<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {

        /*
        |--------------------------------------------------------------------------
        | USER
        |--------------------------------------------------------------------------
        */

        Permission::create([
            'nama_permission' => 'user.view'
        ]);

        Permission::create([
            'nama_permission' => 'user.create'
        ]);

        Permission::create([
            'nama_permission' => 'user.update'
        ]);

        Permission::create([
            'nama_permission' => 'user.delete'
        ]);


        /*
        |--------------------------------------------------------------------------
        | ROLE
        |--------------------------------------------------------------------------
        */

        Permission::create([
            'nama_permission' => 'role.view'
        ]);

        Permission::create([
            'nama_permission' => 'role.create'
        ]);

        Permission::create([
            'nama_permission' => 'role.update'
        ]);

        Permission::create([
            'nama_permission' => 'role.delete'
        ]);


        /*
        |--------------------------------------------------------------------------
        | PERMISSION
        |--------------------------------------------------------------------------
        */

        Permission::create([
            'nama_permission' => 'permission.view'
        ]);

        Permission::create([
            'nama_permission' => 'permission.create'
        ]);

        Permission::create([
            'nama_permission' => 'permission.update'
        ]);

        Permission::create([
            'nama_permission' => 'permission.delete'
        ]);


        /*
        |--------------------------------------------------------------------------
        | PENGADUAN
        |--------------------------------------------------------------------------
        */

        Permission::create([
            'nama_permission' => 'pengaduan.view'
        ]);

        Permission::create([
            'nama_permission' => 'pengaduan.create'
        ]);

        Permission::create([
            'nama_permission' => 'pengaduan.update'
        ]);

        Permission::create([
            'nama_permission' => 'pengaduan.delete'
        ]);

        Permission::create([
            'nama_permission' => 'pengaduan.export'
        ]);

        Permission::create([
            'nama_permission' => 'pengaduan.approval'
        ]);


        /*
        |--------------------------------------------------------------------------
        | TANGGAPAN
        |--------------------------------------------------------------------------
        */

        Permission::create([
            'nama_permission' => 'tanggapan.view'
        ]);

        Permission::create([
            'nama_permission' => 'tanggapan.create'
        ]);

        Permission::create([
            'nama_permission' => 'tanggapan.update'
        ]);

        Permission::create([
            'nama_permission' => 'tanggapan.delete'
        ]);

    }
}