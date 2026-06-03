@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">

                Detail Pengaduan

            </h2>

            <p class="text-muted mb-0">

                Informasi lengkap laporan masyarakat

            </p>

        </div>

        <a href="/admin/pengaduan"
           class="btn btn-secondary rounded-pill px-4">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </a>

    </div>

    <div class="row">

        <!-- DETAIL -->
        <div class="col-lg-8">

            <div class="card border-0 shadow rounded-4 mb-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">

                        Informasi Pengaduan

                    </h4>

                    <!-- JUDUL -->
                    <div class="mb-4">

                        <label class="text-muted fw-semibold">

                            Judul Pengaduan

                        </label>

                        <div class="fs-4 fw-bold text-dark">

                            {{ $pengaduan->judul }}

                        </div>

                    </div>

                    <!-- ISI -->
                    <div class="mb-4">

                        <label class="text-muted fw-semibold">

                            Isi Laporan

                        </label>

                        <div class="bg-light rounded-4 p-4 mt-2">

                            {{ $pengaduan->isi_laporan }}

                        </div>

                    </div>

                    <!-- FOTO -->
                    @if($pengaduan->foto)

                    <div class="mb-3">

                        <label class="text-muted fw-semibold">

                            Foto Bukti

                        </label>

                        <div class="mt-3">

                            <img src="{{ asset('storage/'.$pengaduan->foto) }}"
                                 class="img-fluid rounded-4 shadow-sm"
                                 style="max-height:450px;
                                        width:100%;
                                        object-fit:cover;">

                        </div>

                    </div>

                    @endif

                </div>

            </div>

            <!-- RIWAYAT TANGGAPAN -->
            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">

                        Riwayat Tanggapan

                    </h4>

                   @forelse($pengaduan->tanggapan ?? [] as $item)

                    <div class="border rounded-4 p-3 mb-3 bg-light">

                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <div class="fw-semibold">

                                {{ $item->user->name ?? 'Admin' }}

                            </div>

                            <small class="text-muted">

                                {{ $item->created_at->format('d M Y H:i') }}

                            </small>

                        </div>

                        <div>

                            {{ $item->tanggapan }}

                        </div>

                    </div>

                    @empty

                    <div class="text-center text-muted py-5">

                        <i class="bi bi-chat-square-text"
                           style="font-size:50px;"></i>

                        <br><br>

                        Belum ada tanggapan

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4">

            <!-- DATA PELAPOR -->
            <div class="card border-0 shadow rounded-4 mb-4">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">

                        Data Pelapor

                    </h5>

                    <!-- NAMA -->
                    <div class="mb-3">

                        <small class="text-muted">

                            Nama Lengkap

                        </small>

                        <div class="fw-semibold fs-6">

                            {{ $pengaduan->user->name }}

                        </div>

                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">

                        <small class="text-muted">

                            Email

                        </small>

                        <div class="fw-semibold fs-6">

                            {{ $pengaduan->user->email }}

                        </div>

                    </div>

                    <!-- ALAMAT -->
                    <div class="mb-3">

                        <small class="text-muted">

                            Alamat

                        </small>

                        <div class="fw-semibold fs-6">

                            {{ $pengaduan->user->alamat }}

                        </div>

                    </div>

                    <!-- TANGGAL -->
                    <div>

                        <small class="text-muted">

                            Tanggal Pengaduan

                        </small>

                        <div class="fw-semibold fs-6">

                            {{ $pengaduan->created_at->format('d M Y') }}

                        </div>

                    </div>

                </div>

            </div>

            <!-- STATUS -->
<div class="card border-0 shadow-lg rounded-4">

    <div class="card-body p-4">

        <h5 class="fw-bold mb-4">

            Status Pengaduan

        </h5>

        <!-- STATUS BADGE -->
        @if($pengaduan->status == 'pending')

            <span class="badge bg-warning px-4 py-3 rounded-pill fs-6">

                Pending

            </span>

        @elseif($pengaduan->status == 'diproses')

            <span class="badge bg-info px-4 py-3 rounded-pill fs-6">

                Diproses

            </span>

        @elseif($pengaduan->status == 'selesai')

            <span class="badge bg-success px-4 py-3 rounded-pill fs-6">

                Selesai

            </span>

        @else

            <span class="badge bg-danger px-4 py-3 rounded-pill fs-6">

                Ditolak

            </span>

        @endif

        <hr>

    </div>

</div>

        </div>

    </div>

</div>

@endsection