<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function dashboard()
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
        | TOTAL USER MASYARAKAT
        |--------------------------------------------------------------------------
        */

        $totalMasyarakat = User::where(
            'role',
            'masyarakat'
        )->count();

        /*
        |--------------------------------------------------------------------------
        | PENGADUAN TERBARU
        |--------------------------------------------------------------------------
        */

        $pengaduanTerbaru = Pengaduan::with('user')
            ->latest()
            ->take(10)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.dashboard',
            compact(
                'totalPengaduan',
                'pending',
                'diproses',
                'selesai',
                'ditolak',
                'totalMasyarakat',
                'pengaduanTerbaru'
            )
        );
    }

/*
|--------------------------------------------------------------------------
| FORM TANGGAPAN
|--------------------------------------------------------------------------
*/

public function formTanggapan($id)
{
    $pengaduan = Pengaduan::with('user')
        ->findOrFail($id);

    return view(
        'admin.tanggapan',
        compact('pengaduan')
    );
}

/*
|--------------------------------------------------------------------------
| SIMPAN TANGGAPAN
|--------------------------------------------------------------------------
*/

public function storeTanggapan(Request $request, $id)
{
    $request->validate([
        'tanggapan' => 'required'
    ]);

    $pengaduan = Pengaduan::findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | SIMPAN TANGGAPAN
    |--------------------------------------------------------------------------
    */

    Tanggapan::create([

        'pengaduan_id' => $pengaduan->id,

        'user_id' => Auth::id(),

        'tanggapan' => $request->tanggapan

    ]);

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS
    |--------------------------------------------------------------------------
    */

    $pengaduan->update([

        'status' => 'diproses'

    ]);

    return redirect()
        ->route('admin.pengaduan.index')
        ->with(
            'success',
            'Tanggapan berhasil dikirim'
        );
}

}

