<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengaduan;
use App\Models\User;
use App\Models\Tanggapan;

class CamatDashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | STATISTIK PENGADUAN
        |--------------------------------------------------------------------------
        */

        $totalPengaduan = Pengaduan::count();

        $pending = Pengaduan::where(
            'status',
            'pending'
        )->count();

        $diproses = Pengaduan::where(
            'status',
            'diproses'
        )->count();

        $selesai = Pengaduan::where(
            'status',
            'selesai'
        )->count();

        $ditolak = Pengaduan::where(
            'status',
            'ditolak'
        )->count();

        /*
        |--------------------------------------------------------------------------
        | PERSENTASE PENYELESAIAN
        |--------------------------------------------------------------------------
        */

        $persentaseSelesai = $totalPengaduan > 0
            ? round(($selesai / $totalPengaduan) * 100)
            : 0;

        /*
        |--------------------------------------------------------------------------
        | TOTAL USER
        |--------------------------------------------------------------------------
        */

        $totalMasyarakat = User::where(
            'role',
            'masyarakat'
        )->count();

        $totalAdmin = User::where(
            'role',
            'admin'
        )->count();

        /*
        |--------------------------------------------------------------------------
        | PENGADUAN TERBARU
        |--------------------------------------------------------------------------
        */

        $pengaduanTerbaru = Pengaduan::with('user')
            ->latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | AKTIVITAS ADMIN
        |--------------------------------------------------------------------------
        */

        $aktivitasAdmin = Tanggapan::with([
                'user',
                'pengaduan'
            ])
            ->latest()
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | GRAFIK BULANAN
        |--------------------------------------------------------------------------
        */

        $grafikBulanan = [

            Pengaduan::whereMonth('created_at', 1)->count(),
            Pengaduan::whereMonth('created_at', 2)->count(),
            Pengaduan::whereMonth('created_at', 3)->count(),
            Pengaduan::whereMonth('created_at', 4)->count(),
            Pengaduan::whereMonth('created_at', 5)->count(),
            Pengaduan::whereMonth('created_at', 6)->count(),
            Pengaduan::whereMonth('created_at', 7)->count(),
            Pengaduan::whereMonth('created_at', 8)->count(),
            Pengaduan::whereMonth('created_at', 9)->count(),
            Pengaduan::whereMonth('created_at', 10)->count(),
            Pengaduan::whereMonth('created_at', 11)->count(),
            Pengaduan::whereMonth('created_at', 12)->count(),

        ];

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'camat.dashboard',
            compact(
                'totalPengaduan',
                'pending',
                'diproses',
                'selesai',
                'ditolak',
                'persentaseSelesai',
                'totalMasyarakat',
                'totalAdmin',
                'pengaduanTerbaru',
                'aktivitasAdmin',
                'grafikBulanan'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | MONITORING PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function monitoring()
    {
        $pengaduans = Pengaduan::with('user')
            ->latest()
            ->get();

        return view(
            'camat.monitoring',
            compact('pengaduans')
        );
    }
    
public function persetujuan()
{
    $pengaduans = Pengaduan::with('user')
        ->latest()
        ->get();

    return view(
        'camat.persetujuan',
        compact('pengaduans')
    );
}

/*
|--------------------------------------------------------------------------
| SETUJUI PENGADUAN
|--------------------------------------------------------------------------
*/

public function setujui($id)
{
    $pengaduan = Pengaduan::findOrFail($id);

    $pengaduan->update([
        'status' => 'selesai'
    ]);

    return redirect()
        ->back()
        ->with(
            'success',
            'Pengaduan berhasil disetujui.'
        );
}

/*
|--------------------------------------------------------------------------
| TOLAK PENGADUAN
|--------------------------------------------------------------------------
*/

public function tolak($id)
{
    $pengaduan = Pengaduan::findOrFail($id);

    $pengaduan->update([
        'status' => 'ditolak'
    ]);

    return redirect()
        ->back()
        ->with(
            'success',
            'Pengaduan berhasil ditolak.'
        );
}


/*
|--------------------------------------------------------------------------
| LAPORAN
|--------------------------------------------------------------------------
*/

public function laporan()
{
    $pengaduans = Pengaduan::latest()->get();

    return view(
        'camat.laporan',
        compact('pengaduans')
    );
}

/*
|--------------------------------------------------------------------------
| AKTIVITAS ADMIN
|--------------------------------------------------------------------------
*/

public function aktivitas()
{
    $aktivitasAdmin = Tanggapan::with([
        'user',
        'pengaduan'
    ])
    ->latest()
    ->get();

    return view(
        'camat.aktivitas',
        compact('aktivitasAdmin')
    );
}

}