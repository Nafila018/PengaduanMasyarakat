<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'nama_permission'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI ROLE
    |--------------------------------------------------------------------------
    */

    public function role()
    {
        return $this->belongsToMany(
            Role::class,
            'permission_role',
            'permission_id',
            'role_id'
        );
    }
}

