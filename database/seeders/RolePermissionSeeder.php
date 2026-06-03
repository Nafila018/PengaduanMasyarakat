<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    

$allPermissions = App\Models\Permission::all();

$admin->permission()->sync(
    $allPermissions->pluck('id')
);




    }
}
