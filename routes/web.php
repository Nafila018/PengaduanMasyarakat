<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPengaduanController;
use App\Http\Controllers\TanggapanController;


use App\Http\Controllers\MasyarakatPengaduanController;
use App\Http\Controllers\MasyarakatDashboardController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\CamatDashboardController;
use App\Http\Controllers\CamatPengaduanController;
use App\Http\Controllers\CamatTanggapanController;
use App\Http\Controllers\CamatMonitoringController;


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');

});

Route::get('/register', [RegisterController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::get(
    '/login',
    [AuthController::class, 'login']
)->name('login');


Route::post(
    '/login',
    [AuthController::class, 'authenticate']
);


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post(
    '/logout',
    [AuthController::class, 'logout']
)->name('logout');


/*
|--------------------------------------------------------------------------
| ROUTE ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth'
])

->prefix('admin')

->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [AdminDashboardController::class, 'dashboard']
    )
    ->middleware('permission:pengaduan.view')
    ->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    Route::resource(
        '/user',
        AdminUserController::class
    )->middleware([
        'index'   => 'permission:user.view',
        'show'    => 'permission:user.view',
        'create'  => 'permission:user.create',
        'store'   => 'permission:user.create',
        'edit'    => 'permission:user.update',
        'update'  => 'permission:user.update',
        'destroy' => 'permission:user.delete',
    ]);


    /*
    |--------------------------------------------------------------------------
    | ROLE
    |--------------------------------------------------------------------------
    */

    Route::resource(
        '/role',
        RoleController::class
    )->middleware([
        'index'   => 'permission:role.view',
        'show'    => 'permission:role.view',
        'create'  => 'permission:role.create',
        'store'   => 'permission:role.create',
        'edit'    => 'permission:role.update',
        'update'  => 'permission:role.update',
        'destroy' => 'permission:role.delete',
    ]);


    /*
    |--------------------------------------------------------------------------
    | PERMISSION
    |--------------------------------------------------------------------------
    */

    Route::resource(
        '/permission',
        PermissionController::class
    )->middleware([
        'index'   => 'permission:permission.view',
        'show'    => 'permission:permission.view',
        'create'  => 'permission:permission.create',
        'store'   => 'permission:permission.create',
        'edit'    => 'permission:permission.update',
        'update'  => 'permission:permission.update',
        'destroy' => 'permission:permission.delete',
    ]);


    /*
    |--------------------------------------------------------------------------
    | PENGADUAN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        '/pengaduan',
        AdminPengaduanController::class
    )->middleware([
        'index'   => 'permission:pengaduan.view',
        'show'    => 'permission:pengaduan.view',
        'create'  => 'permission:pengaduan.create',
        'store'   => 'permission:pengaduan.create',
        'edit'    => 'permission:pengaduan.update',
        'update'  => 'permission:pengaduan.update',
        'destroy' => 'permission:pengaduan.delete',
    ]);


    /*
    |--------------------------------------------------------------------------
    | TANGGAPAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/tanggapan',
        [TanggapanController::class, 'index']
    )
    ->middleware('permission:tanggapan.view')
    ->name('tanggapan.index');


    Route::get(
        '/tanggapan/create',
        [TanggapanController::class, 'create']
    )
    ->middleware('permission:tanggapan.create')
    ->name('tanggapan.create');


    Route::get(
        '/tanggapan/{id}',
        [TanggapanController::class, 'show']
    )
    ->middleware('permission:tanggapan.view')
    ->name('tanggapan.show');


    Route::post(
        '/tanggapan/{id}',
        [TanggapanController::class, 'store']
    )
    ->middleware('permission:tanggapan.create')
    ->name('tanggapan.store');

});


/*
|--------------------------------------------------------------------------
| ROUTE MASYARAKAT
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth'
])

->group(function () {

    Route::get(
        '/masyarakat/dashboard',
        [MasyarakatDashboardController::class, 'dashboard']
    )
    ->middleware('permission:pengaduan.view')
    ->name('masyarakat.dashboard');


    Route::get(
        '/masyarakat/progress',
        [MasyarakatDashboardController::class, 'progress']
    )
    ->middleware('permission:pengaduan.view')
    ->name('masyarakat.progress');


    Route::get(
        '/masyarakat/profile',
        [ProfileController::class, 'index']
    )
    ->name('masyarakat.profile');


    Route::put(
        '/masyarakat/profile/update',
        [ProfileController::class, 'update']
    )
    ->name('masyarakat.profile.update');


    Route::prefix('masyarakat')
        ->name('masyarakat.')
        ->group(function () {

            Route::resource(
                'pengaduan',
                MasyarakatPengaduanController::class
            )->middleware([
                'index'   => 'permission:pengaduan.view',
                'show'    => 'permission:pengaduan.view',
                'create'  => 'permission:pengaduan.create',
                'store'   => 'permission:pengaduan.create',
                'edit'    => 'permission:pengaduan.update',
                'update'  => 'permission:pengaduan.update',
                'destroy' => 'permission:pengaduan.delete',
            ]);

        });

});


/*
|--------------------------------------------------------------------------
| ROUTE CAMAT
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth'
])

->prefix('camat')

->name('camat.')

->group(function () {

    Route::get(
        '/dashboard',
        [CamatDashboardController::class, 'index']
    )
    ->middleware('permission:pengaduan.view')
    ->name('dashboard');


    Route::get(
        '/monitoring',
        [CamatDashboardController::class, 'monitoring']
    )
    ->middleware('permission:pengaduan.view')
    ->name('monitoring');


    Route::get(
        '/persetujuan',
        [CamatDashboardController::class, 'persetujuan']
    )
    ->middleware('permission:pengaduan.approval')
    ->name('persetujuan');


    Route::post(
        '/persetujuan/{id}/setujui',
        [CamatDashboardController::class, 'setujui']
    )
    ->middleware('permission:pengaduan.approval')
    ->name('setujui');


    Route::post(
        '/persetujuan/{id}/tolak',
        [CamatDashboardController::class, 'tolak']
    )
    ->middleware('permission:pengaduan.approval')
    ->name('tolak');


    Route::get(
        '/laporan',
        [CamatDashboardController::class, 'laporan']
    )
    ->middleware('permission:pengaduan.export')
    ->name('laporan');


    Route::get(
        '/aktivitas',
        [CamatDashboardController::class, 'aktivitas']
    )
    ->middleware('permission:pengaduan.view')
    ->name('aktivitas');


    Route::get(
        '/pengaduan',
        [CamatPengaduanController::class, 'index']
    )
    ->middleware('permission:pengaduan.view')
    ->name('pengaduan.index');


    Route::get(
        '/pengaduan/{id}',
        [CamatPengaduanController::class, 'show']
    )
    ->middleware('permission:pengaduan.view')
    ->name('pengaduan.show');


    Route::get(
        '/pengaduan/{id}/pdf',
        [CamatPengaduanController::class, 'pdf']
    )
    ->middleware('permission:pengaduan.export')
    ->name('pengaduan.pdf');

});

