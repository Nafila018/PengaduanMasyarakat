@extends('layouts.app')

@section('content')

<div class="container py-4"
     style="max-width:750px;">

    <!-- HEADER -->
    <div class="card border-0 shadow-lg mb-4 overflow-hidden"
         style="border-radius:24px;">

        <div class="card-body p-5"
             style="
             background:linear-gradient(
             135deg,
             #1e3a8a,
             #2563eb,
             #3b82f6);
             color:white;
             position:relative;
             ">

            <!-- ORNAMEN -->
            <div style="
                 position:absolute;
                 right:-20px;
                 top:-20px;
                 font-size:120px;
                 opacity:0.08;
                 ">

                👤

            </div>

            <div class="position-relative">

                <span class="badge bg-light text-primary px-3 py-2 rounded-pill mb-3">

                    Admin Panel

                </span>

                <h2 class="fw-bold mb-2">

                    Tambah User Baru

                </h2>

                <p class="mb-0"
                   style="opacity:0.9;">

                    Tambahkan akun pengguna baru ke dalam sistem pengaduan masyarakat.

                </p>

            </div>

        </div>

    </div>

    <!-- FORM -->
    <div class="card border-0 shadow-sm"
         style="border-radius:24px;">

        <div class="card-body p-5">

            <!-- ERROR -->
            @if ($errors->any())

                <div class="alert alert-danger border-0 shadow-sm"
                     style="border-radius:14px;">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="/admin/user"
                  method="POST">

                @csrf

                <!-- NAMA -->
                <div class="mb-4">

                    <label class="form-label fw-bold text-primary">

                        Nama Lengkap

                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-primary text-white border-0">

                            <i class="bi bi-person-fill"></i>

                        </span>

                        <input type="text"
                               name="name"
                               class="form-control border-0 shadow-sm"
                               placeholder="Masukkan nama lengkap"
                               style="
                               height:50px;
                               border-radius:0 14px 14px 0;
                               ">

                    </div>

                </div>

                <!-- EMAIL -->
                <div class="mb-4">

                    <label class="form-label fw-bold text-primary">

                        Email

                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-info text-white border-0">

                            <i class="bi bi-envelope-fill"></i>

                        </span>

                        <input type="email"
                               name="email"
                               class="form-control border-0 shadow-sm"
                               placeholder="Masukkan email"
                               style="
                               height:50px;
                               border-radius:0 14px 14px 0;
                               ">

                    </div>

                </div>

                <!-- PASSWORD -->
                <div class="mb-4">

                    <label class="form-label fw-bold text-primary">

                        Password

                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-dark text-white border-0">

                            <i class="bi bi-lock-fill"></i>

                        </span>

                        <input type="password"
                               name="password"
                               class="form-control border-0 shadow-sm"
                               placeholder="Masukkan password"
                               style="
                               height:50px;
                               border-radius:0 14px 14px 0;
                               ">

                    </div>

                </div>

                <!-- ROLE -->
                <div class="mb-4">

                    <label class="form-label fw-bold text-primary">

                        Role Pengguna

                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-success text-white border-0">

                            <i class="bi bi-person-badge-fill"></i>

                        </span>

                        <select name="role"
                                class="form-select border-0 shadow-sm"
                                style="
                                height:50px;
                                border-radius:0 14px 14px 0;
                                ">

                            <option value="">

                                -- Pilih Role --

                            </option>

                            <option value="admin">

                                Admin

                            </option>

                            <option value="camat">

                                Camat

                            </option>

                            <option value="masyarakat">

                                Masyarakat

                            </option>

                        </select>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex gap-3 mt-5">

                    <button type="submit"
                            class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">

                        <i class="bi bi-save-fill me-1"></i>

                        Simpan User

                    </button>

                    <a href="/admin/user"
                       class="btn btn-light border px-4 py-2 rounded-pill">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection