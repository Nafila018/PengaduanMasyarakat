<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
class MasyarakatDashboardController extends Controller
{
    public function dashboard()
    {
        /*
        |--------------------------------------------------------------------------
        | DATA PENGADUAN USER LOGIN
        |--------------------------------------------------------------------------
        */

        $pengaduans = Pengaduan::where(
                'user_id',
                Auth::id()
            )
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | PENGADUAN TERBARU
        |--------------------------------------------------------------------------
        */

        $pengaduanTerbaru = Pengaduan::where(
                'user_id',
                Auth::id()
            )
            ->latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $total = Pengaduan::where(
            'user_id',
            Auth::id()
        )->count();

        $pending = Pengaduan::where(
            'user_id',
            Auth::id()
        )->where(
            'status',
            'pending'
        )->count();

        $diproses = Pengaduan::where(
            'user_id',
            Auth::id()
        )->where(
            'status',
            'diproses'
        )->count();

        $selesai = Pengaduan::where(
            'user_id',
            Auth::id()
        )->where(
            'status',
            'selesai'
        )->count();

        $ditolak = Pengaduan::where('user_id', Auth::id())
            ->where('status', 'ditolak')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */
        $tanggapans = Tanggapan::with('pengaduan')
                ->latest()
                ->take(5)
                ->get();

        return view(
            'masyarakat.dashboard',
            compact(
                'pengaduans',
                'pengaduanTerbaru',
                'total',
                'pending',
                'diproses',
                'selesai',
                'ditolak',
                'tanggapans',
            )
        );
    }
    public function progress()
{
    $pengaduans = Pengaduan::where(
            'user_id',
            Auth::id()
        )
        ->latest()
        ->get();

    return view(
        'masyarakat.progress',
        compact('pengaduans')
    );
}
}
