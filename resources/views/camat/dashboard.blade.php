@extends('layouts.camat')

@section('title', 'Dashboard Camat')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">
                Dashboard Camat
            </h2>

            <p class="text-muted mb-0">
                Monitoring Sistem Pengaduan Masyarakat Desa
            </p>
        </div>

        <div>
            <span class="badge bg-success p-2">
                Persentase Penyelesaian :
                {{ $persentaseSelesai }}%
            </span>
        </div>
    </div>

    {{-- CARD STATISTIK --}}
    <div class="row g-4 mb-4">

        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Pengaduan</h6>

                    <h2 class="fw-bold text-primary">
                        {{ $totalPengaduan }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body">
                    <h6 class="text-muted">Pending</h6>

                    <h2 class="fw-bold text-warning">
                        {{ $pending }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body">
                    <h6 class="text-muted">Diproses</h6>

                    <h2 class="fw-bold text-info">
                        {{ $diproses }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body">
                    <h6 class="text-muted">Selesai</h6>

                    <h2 class="fw-bold text-success">
                        {{ $selesai }}
                    </h2>
                </div>
            </div>
        </div>

    </div>

    {{-- GRAFIK + USER --}}
    <div class="row mb-4">

        {{-- GRAFIK --}}
        <div class="col-md-8 mb-4">

            <div class="card shadow border-0 rounded-4 h-100">

                <div class="card-header bg-white border-0">
                    <h5 class="fw-bold">
                        Grafik Pengaduan Bulanan
                    </h5>
                </div>

                <div class="card-body">
                    <canvas id="grafikPengaduan"></canvas>
                </div>

            </div>

        </div>

        {{-- DATA USER --}}
        <div class="col-md-4 mb-4">

            <div class="card shadow border-0 rounded-4 mb-3">

                <div class="card-body">
                    <h6 class="text-muted">
                        Total Masyarakat
                    </h6>

                    <h2 class="fw-bold text-dark">
                        {{ $totalMasyarakat }}
                    </h2>
                </div>

            </div>

            <div class="card shadow border-0 rounded-4">

                <div class="card-body">
                    <h6 class="text-muted">
                        Total Admin
                    </h6>

                    <h2 class="fw-bold text-dark">
                        {{ $totalAdmin }}
                    </h2>
                </div>

            </div>

        </div>

    </div>

    {{-- PENGADUAN TERBARU --}}
    <div class="card shadow border-0 rounded-4 mb-4">

        <div class="card-header bg-white border-0">
            <h5 class="fw-bold">
                Pengaduan Terbaru
            </h5>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($pengaduanTerbaru as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $item->user->name ?? '-' }}
                        </td>

                        <td>
                            {{ $item->judul }}
                        </td>

                        <td>

                            @if($item->status == 'pending')

                                <span class="badge bg-warning">
                                    Pending
                                </span>

                            @elseif($item->status == 'diproses')

                                <span class="badge bg-info">
                                    Diproses
                                </span>

                            @elseif($item->status == 'selesai')

                                <span class="badge bg-success">
                                    Selesai
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Ditolak
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $item->created_at->format('d M Y') }}
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            Belum ada pengaduan
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- AKTIVITAS ADMIN --}}
    <div class="card shadow border-0 rounded-4 mb-4">

        <div class="card-header bg-white border-0">
            <h5 class="fw-bold">
                Aktivitas Admin
            </h5>
        </div>

        <div class="card-body">

            @forelse($aktivitasAdmin as $item)

                <div class="border-bottom pb-3 mb-3">

                    <h6 class="fw-bold mb-1">
                        {{ $item->user->name ?? '-' }}
                    </h6>

                    <p class="mb-1 text-muted">
                        Memberi tanggapan pada pengaduan:
                    </p>

                    <p class="fw-semibold">
                        {{ $item->pengaduan->judul ?? '-' }}
                    </p>

                    <small class="text-secondary">
                        {{ $item->created_at->diffForHumans() }}
                    </small>

                </div>

            @empty

                <p class="text-muted">
                    Belum ada aktivitas admin
                </p>

            @endforelse

        </div>

    </div>

</div>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    const ctx = document.getElementById('grafikPengaduan');

    new Chart(ctx, {

        type: 'bar',

        data: {

            labels: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Ags',
                'Sep',
                'Okt',
                'Nov',
                'Des'
            ],

            datasets: [{

                label: 'Jumlah Pengaduan',

                data: @json($grafikBulanan),

                borderWidth: 1

            }]

        },

        options: {

            responsive: true,

            scales: {

                y: {

                    beginAtZero: true

                }

            }

        }

    });

</script>

@endsection