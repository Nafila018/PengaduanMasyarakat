@extends('layouts.app')

@section('content')

<style>

    .glass-info{
        background:rgba(255,255,255,0.15);
        backdrop-filter:blur(10px);
        border:1px solid rgba(255,255,255,0.2);
    }

</style>

<div class="container-fluid">

    <!-- HEADER -->
    <div class="card border-0 shadow-lg mb-4 overflow-hidden"
         style="
         border-radius:25px;
         background:linear-gradient(
         135deg,
         #2563eb,
         #1e40af
         );
         color:white;
         ">

        <div class="card-body p-5">

            <div class="row align-items-center">

                <!-- TEXT -->
                <div class="col-md-8">

                    <h2 class="fw-bold mb-3">

                        Tambah Permission

                    </h2>

                    <p class="mb-3 opacity-75"
                       style="line-height:1.8;">

                        Permission digunakan untuk mengatur
                        hak akses pengguna pada sistem.
                        Dengan permission, admin dapat menentukan
                        fitur apa saja yang dapat diakses oleh
                        setiap pengguna sesuai perannya.

                    </p>

                    <!-- INFO -->
                    <div class="glass-info p-3 rounded-4">

                        <small>

                            <i class="bi bi-info-circle-fill"></i>

                            Contoh permission:
                            tambah_pengaduan,
                            edit_pengaduan,
                            hapus_pengaduan,
                            cetak_laporan.

                        </small>

                    </div>

                </div>

                <!-- ICON -->
                <div class="col-md-4 text-center">

                    <div style="
                         font-size:95px;
                         opacity:0.2;
                         ">

                        <i class="bi bi-shield-lock-fill"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- FORM -->
    <div class="card border-0 shadow-lg"
         style="
         border-radius:25px;
         ">

        <div class="card-body p-5">

            <!-- ERROR -->
            @if($errors->any())

                <div class="alert alert-danger rounded-4">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>

                                {{ $error }}

                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <!-- FORM -->
            <form action="/admin/permission"
                  method="POST">

                @csrf

                <!-- INPUT -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Nama Permission

                    </label>

                    <input type="text"
                           name="nama_permission"
                           class="form-control form-control-lg rounded-4"
                           placeholder="Masukkan nama permission"
                           required>

                    <small class="text-muted">

                        Gunakan nama permission yang jelas
                        dan mudah dipahami.

                    </small>

                </div>

                <!-- BUTTON -->
                <div class="d-flex gap-3 flex-wrap">

                    <!-- SIMPAN -->
                    <button type="submit"
                            class="btn btn-primary btn-lg rounded-pill px-5 shadow">

                        <i class="bi bi-save-fill"></i>

                        Simpan

                    </button>

                    <!-- KEMBALI -->
                    <a href="/admin/permission"
                       class="btn btn-secondary btn-lg rounded-pill px-5">

                        <i class="bi bi-arrow-left-circle-fill"></i>

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

