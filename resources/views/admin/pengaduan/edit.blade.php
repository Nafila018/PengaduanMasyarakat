@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="mb-4">

        <h2 class="fw-bold mb-1">

            Update Status Pengaduan

        </h2>

        <small class="text-muted">

            Kelola status pengaduan masyarakat dengan mudah

        </small>

    </div>

    <!-- CARD -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <!-- HEADER CARD -->
        <div style="
             background:linear-gradient(
             135deg,
             #2563eb,
             #1e40af
             );
             color:white;
             padding:25px;
             ">

            <h4 class="mb-1 fw-bold">

                Detail Pengaduan

            </h4>

            <small>

                Periksa informasi pengaduan sebelum mengubah status

            </small>

        </div>

        <!-- BODY -->
        <div class="card-body p-4">

            <form action="/admin/pengaduan/{{ $pengaduan->id }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- JUDUL -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">

                            Judul Pengaduan

                        </label>

                        <input type="text"
                               class="form-control rounded-4 shadow-sm"
                               value="{{ $pengaduan->judul }}"
                               readonly>

                    </div>

                    <!-- PELAPOR -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">

                            Nama Pelapor

                        </label>

                        <input type="text"
                               class="form-control rounded-4 shadow-sm"
                               value="{{ $pengaduan->user->name }}"
                               readonly>

                    </div>

                </div>

                <!-- ISI LAPORAN -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Isi Laporan

                    </label>

                    <textarea class="form-control rounded-4 shadow-sm"
                              rows="5"
                              readonly>{{ $pengaduan->isi_laporan }}</textarea>

                </div>

                <!-- FOTO -->
                @if($pengaduan->foto)

                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Foto Pengaduan

                    </label>

                    <br>

                    <img src="{{ asset('storage/'.$pengaduan->foto) }}"
                         width="250"
                         class="rounded-4 shadow-sm border">

                </div>

                @endif

                <!-- STATUS -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Status Pengaduan

                    </label>

                    <select name="status"
                            class="form-select rounded-4 shadow-sm">

                        <option value="pending"
                            {{ $pengaduan->status == 'pending' ? 'selected' : '' }}>

                            Pending

                        </option>

                        <option value="diproses"
                            {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>

                            Diproses

                        </option>

                        <option value="selesai"
                            {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>

                            Selesai

                        </option>

                        <option value="ditolak"
                            {{ $pengaduan->status == 'ditolak' ? 'selected' : '' }}>

                            Ditolak

                        </option>

                    </select>

                </div>

                    <!-- KEMBALI -->
                    <a href="/admin/pengaduan"
                       class="btn btn-secondary rounded-pill px-4 shadow-sm">

                        <i class="bi bi-arrow-left-circle-fill"></i>

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

