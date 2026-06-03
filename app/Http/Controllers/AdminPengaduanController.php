<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Pengaduan;

class AdminPengaduanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TAMPIL SEMUA PENGADUAN
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        // AMBIL DATA PENGADUAN + USER
        $pengaduan = Pengaduan::with('user')

                        ->when(
                            $request->search,
                            function ($query) use ($request) {

                                $query->where(
                                    'judul',
                                    'like',
                                    '%' . $request->search . '%'
                                );

                            }
                        )

                        ->latest()

                        ->paginate(10);

        // KIRIM KE VIEW
        return view(
            'admin.pengaduan.index',
            compact('pengaduan')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {

    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN DATA
    |--------------------------------------------------------------------------
    */
public function store(Request $request)
{
    // VALIDASI
    $request->validate([

        'judul' => 'required',
        'isi'   => 'required',
        'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

    ]);

    // FOTO
    $foto = null;

    if ($request->hasFile('foto'))
    {
        $foto = $request->file('foto')
                        ->store('pengaduan', 'public');
    }

    // SIMPAN DATA
    Pengaduan::create([

        'user_id' => auth()->id(),
        'judul'   => $request->judul,
        'isi'     => $request->isi,
        'foto'    => $foto,
        'status'  => 'pending'

    ]);

    // REDIRECT
    return redirect()
        ->back()
        ->with(
            'success',
            'Pengaduan berhasil dikirim'
        );
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

    return view(
        'admin.pengaduan.show',
        compact('pengaduan')
    );
}
    /*
    |--------------------------------------------------------------------------
    | FORM EDIT STATUS
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        // AMBIL DATA
        $pengaduan = Pengaduan::findOrFail($id);

        // KIRIM KE VIEW
        return view(
            'admin.pengaduan.edit',
            compact('pengaduan')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        // VALIDASI
        $request->validate([

            'status' => 'required'

        ]);

        // AMBIL DATA
        $pengaduan = Pengaduan::findOrFail($id);

        // UPDATE STATUS
        $pengaduan->update([

            'status' => $request->status

        ]);

        // REDIRECT
        return redirect('/admin/pengaduan')
                ->with(
                    'success',
                    'Status pengaduan berhasil diupdate'
                );
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS PENGADUAN
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        // AMBIL DATA
        $pengaduan = Pengaduan::findOrFail($id);

        // HAPUS FOTO
        if ($pengaduan->foto)
        {
            Storage::disk('public')
                    ->delete($pengaduan->foto);
        }

        // HAPUS DATA
        $pengaduan->delete();

        // REDIRECT
        return redirect('/admin/pengaduan')
                ->with(
                    'success',
                    'Pengaduan berhasil dihapus'
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


}