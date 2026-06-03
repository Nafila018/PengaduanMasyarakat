<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;

class CamatPengaduanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST PENGADUAN
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
{
    // QUERY DASAR
    $query = Pengaduan::with('user');

    /*
    |--------------------------------------------------------------------------
    | SEARCH JUDUL
    |--------------------------------------------------------------------------
    */
    if($request->search)
    {
        $query->where('judul',
                      'like',
                      '%'.$request->search.'%');
    }

    /*
    |--------------------------------------------------------------------------
    | FILTER STATUS
    |--------------------------------------------------------------------------
    */
    if($request->status)
    {
        $query->where('status',
                      $request->status);
    }

    // AMBIL DATA
    $pengaduan = $query->latest()
                        ->paginate(5);

    // AGAR PAGINATION TIDAK HILANG FILTER
    $pengaduan->appends($request->all());

    return view('camat.pengaduan.index',
                compact('pengaduan'));
}

    /*
    |--------------------------------------------------------------------------
    | DETAIL PENGADUAN
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $pengaduan = Pengaduan::with([
                            'user',
                            'tanggapan.user'
                        ])->findOrFail($id);

        return view('camat.pengaduan.show',
                    compact('pengaduan'));
    }
 /*
|--------------------------------------------------------------------------
| CETAK PDF
|--------------------------------------------------------------------------
*/
public function pdf($id)
{
    // AMBIL DATA PENGADUAN
    $pengaduan = Pengaduan::with('user')
        ->findOrFail($id);

    // LOAD PDF
    $pdf = Pdf::loadView(
        'camat.pdf.pengaduan',
        compact('pengaduan')
    );

    // DOWNLOAD PDF
    return $pdf->download(
        'laporan-pengaduan.pdf'
    );
}
}