<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Storage;

class MasyarakatPengaduanController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $pengaduans = Pengaduan::where(
            'user_id',
            auth()->id()
        )->latest()->get();

        return view(
            'masyarakat.pengaduan.index',
            compact('pengaduans')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('masyarakat.pengaduan.create');
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'judul' => 'required',

            'deskripsi' => 'required',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);


        $foto = null;


        // UPLOAD FOTO
        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')
                            ->store('pengaduan', 'public');
        }


        // SIMPAN PENGADUAN
        Pengaduan::create([

            'user_id' => auth()->id(),

            'judul' => $request->judul,

            'isi_laporan' => $request->deskripsi,

            'foto' => $foto,

            'status' => 'pending',

        ]);


        return redirect()
            ->route('masyarakat.pengaduan.index')
            ->with('success', 'Pengaduan berhasil dikirim');
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view(
            'masyarakat.pengaduan.show',
            compact('pengaduan')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view(
            'masyarakat.pengaduan.edit',
            compact('pengaduan')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

   public function update(Request $request, $id)
{
    $pengaduan = Pengaduan::findOrFail($id);

    $request->validate([

        'judul' => 'required',

        'deskripsi' => 'required',

        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

    ]);


    // FOTO
    if ($request->hasFile('foto')) {

        // HAPUS FOTO LAMA
        if ($pengaduan->foto &&
            \Storage::disk('public')->exists($pengaduan->foto)) {

            \Storage::disk('public')
                ->delete($pengaduan->foto);
        }

        // UPLOAD FOTO BARU
        $foto = $request->file('foto')
                        ->store('pengaduan', 'public');

    } else {

        $foto = $pengaduan->foto;
    }


    // UPDATE DATA
    $pengaduan->update([

        'judul' => $request->judul,

        'isi_laporan' => $request->deskripsi,

        'foto' => $foto,

    ]);


    return redirect()
        ->route('masyarakat.pengaduan.index')
        ->with('success', 'Pengaduan berhasil diperbarui');
}
    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);


        // HAPUS FOTO
        if ($pengaduan->foto &&
            Storage::disk('public')->exists($pengaduan->foto)) {

            Storage::disk('public')
                ->delete($pengaduan->foto);
        }


        // HAPUS DATA
        $pengaduan->delete();


        return redirect()
            ->route('masyarakat.pengaduan.index')
            ->with('success', 'Pengaduan berhasil dibatalkan');
    }

}