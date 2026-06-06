@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h2 class="fw-bold mb-1 text-dark">

                Dashboard Admin

            </h2>

            <p class="text-muted mb-0">

                Monitoring Sistem Pengaduan Masyarakat
                Kecamatan Parigi Tengah

            </p>

        </div>

        <!-- PROFILE -->
        <div class="d-flex align-items-center gap-3 bg-white shadow-sm rounded-4 px-3 py-2">

            <div class="text-end">

                <div class="fw-semibold text-dark">

                    {{ Auth::user()->name }}

                </div>

                <small class="text-muted">

                    Administrator

                </small>

            </div>

            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow"
                 style="
                 width:50px;
                 height:50px;
                 font-size:20px;
                 font-weight:bold;
                 ">

                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

            </div>

        </div>

    </div>

    <!-- STATISTIK -->
    <div class="row g-4 mb-4">

        <!-- TOTAL -->
        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Total Pengaduan

                            </small>

                            <h2 class="fw-bold mt-2 mb-0">

                                {{ $totalPengaduan }}

                            </h2>

                        </div>

                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle">

                            <i class="bi bi-folder-fill text-primary fs-2"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- PENDING -->
        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Pending

                            </small>

                            <h2 class="fw-bold text-warning mt-2 mb-0">

                                {{ $pending }}

                            </h2>

                        </div>

                        <div class="bg-warning bg-opacity-10 p-3 rounded-circle">

                            <i class="bi bi-clock-fill text-warning fs-2"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- DIPROSES -->
        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Diproses

                            </small>

                            <h2 class="fw-bold text-info mt-2 mb-0">

                                {{ $diproses }}

                            </h2>

                        </div>

                        <div class="bg-info bg-opacity-10 p-3 rounded-circle">

                            <i class="bi bi-arrow-repeat text-info fs-2"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- SELESAI -->
        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Selesai

                            </small>

                            <h2 class="fw-bold text-success mt-2 mb-0">

                                {{ $selesai }}

                            </h2>

                        </div>

                        <div class="bg-success bg-opacity-10 p-3 rounded-circle">

                            <i class="bi bi-check-circle-fill text-success fs-2"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- GRAFIK + AKTIVITAS -->
    <div class="row g-4 mb-4">

        <!-- GRAFIK -->
        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>

                            <h5 class="fw-bold mb-1">

                                Statistik Pengaduan

                            </h5>

                            <small class="text-muted">

                                Monitoring data pengaduan masyarakat

                            </small>

                        </div>

                    </div>

                    <canvas id="pengaduanChart"
                            height="110"></canvas>

                </div>

            </div>

        </div>

        <!-- AKTIVITAS -->
        <div class="col-lg-4">

            <div class="card border-0 shadow-lg rounded-4 h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">

                        Aktivitas Terbaru

                    </h5>

                    <!-- ITEM -->
                    <div class="d-flex align-items-start gap-3 mb-4">

                        <div class="bg-warning bg-opacity-10 p-2 rounded-circle">

                            <i class="bi bi-clock-fill text-warning"></i>

                        </div>

                        <div>

                            <div class="fw-semibold">

                                {{ $pending }} Pengaduan Pending

                            </div>

                            <small class="text-muted">

                                Menunggu verifikasi admin

                            </small>

                        </div>

                    </div>

                    <!-- ITEM -->
                    <div class="d-flex align-items-start gap-3 mb-4">

                        <div class="bg-info bg-opacity-10 p-2 rounded-circle">

                            <i class="bi bi-arrow-repeat text-info"></i>

                        </div>

                        <div>

                            <div class="fw-semibold">

                                {{ $diproses }} Pengaduan Diproses

                            </div>

                            <small class="text-muted">

                                Sedang ditindaklanjuti

                            </small>

                        </div>

                    </div>

                    <!-- ITEM -->
                    <div class="d-flex align-items-start gap-3">

                        <div class="bg-success bg-opacity-10 p-2 rounded-circle">

                            <i class="bi bi-check-circle-fill text-success"></i>

                        </div>

                        <div>

                            <div class="fw-semibold">

                                {{ $selesai }} Pengaduan Selesai

                            </div>

                            <small class="text-muted">

                                Laporan telah selesai

                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- PENGADUAN TERBARU -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h5 class="fw-bold mb-1">

                        Pengaduan Terbaru

                    </h5>

                    <small class="text-muted">

                        Data laporan masyarakat terbaru

                    </small>

                </div>

                <a href="/admin/pengaduan"
                   class="btn btn-primary rounded-pill px-4">

                    Lihat Semua

                </a>

            </div>

            <!-- TABLE -->
            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>Pelapor</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Tanggal</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pengaduanTerbaru as $item)

                        <tr>

                            <!-- USER -->
                            <td>

                                <div class="fw-semibold">

                                    {{ $item->user?->name ?? 'User tidak ditemukan' }}

                                </div>

                            </td>

                            <!-- JUDUL -->
                            <td>

                                {{ $item->judul }}

                            </td>

                            <!-- STATUS -->
                            <td>

                                @if($item->status == 'pending')

                                    <span class="badge bg-warning rounded-pill px-3 py-2">

                                        Pending

                                    </span>

                                @elseif($item->status == 'diproses')

                                    <span class="badge bg-info rounded-pill px-3 py-2">

                                        Diproses

                                    </span>

                                @elseif($item->status == 'selesai')

                                    <span class="badge bg-success rounded-pill px-3 py-2">

                                        Selesai

                                    </span>

                                @else

                                    <span class="badge bg-danger rounded-pill px-3 py-2">

                                        Ditolak

                                    </span>

                                @endif

                            </td>

                            <!-- TANGGAL -->
                            <td>

                                {{ $item->created_at->format('d M Y') }}

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4"
                                class="text-center text-muted py-5">

                                Belum ada pengaduan

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('pengaduanChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [

            'Pending',
            'Diproses',
            'Selesai',
            'Ditolak'

        ],

        datasets: [{

            label: 'Jumlah Pengaduan',

            data: [

                {{ $pending }},
                {{ $diproses }},
                {{ $selesai }},
                {{ $ditolak }}

            ],

            borderRadius: 10

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                display: false

            }

        }

    }

});

</script>

@endsection