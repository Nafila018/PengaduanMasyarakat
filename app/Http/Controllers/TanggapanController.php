<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengaduan;
use App\Models\Tanggapan;

class TanggapanController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        // AMBIL DATA TANGGAPAN
        $tanggapan = Tanggapan::with([
            'pengaduan'
        ])->latest()->get();

        // TAMPILKAN VIEW
        return view(
            'admin.tanggapan.index',
            compact('tanggapan')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | FORM TANGGAPAN
    |--------------------------------------------------------------------------
    */

    public function create($id)
    {
        // AMBIL DATA PENGADUAN
        $pengaduan = Pengaduan::with('user')
            ->findOrFail($id);

        // TAMPILKAN VIEW
        return view(
            'admin.tanggapan.create',
            compact('pengaduan')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL TANGGAPAN
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        // AMBIL DATA PENGADUAN
        $pengaduan = Pengaduan::with([
            'user',
            'tanggapan'
        ])->findOrFail($id);

        // TAMPILKAN VIEW
        return view(
            'admin.tanggapan.show',
            compact('pengaduan')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN TANGGAPAN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, $id)
    {
        // VALIDASI
        $request->validate([

            'tanggapan' => 'required'

        ]);


        // SIMPAN TANGGAPAN
        Tanggapan::create([

            'pengaduan_id' => $id,

            'tanggapan' => $request->tanggapan

        ]);


        // UPDATE STATUS PENGADUAN
        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->update([

            'status' => 'diproses'

        ]);


        // REDIRECT
        return redirect('/admin/pengaduan')
            ->with(
                'success',
                'Tanggapan berhasil dikirim'
            );
    }

}