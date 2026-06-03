@extends('layouts.camat')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="card border-0 shadow-lg mb-4 overflow-hidden"
         style="border-radius:24px;">

        <div class="card-body p-5"
             style="
             background:linear-gradient(
             135deg,
             #0f4c81,
             #2563eb
             );
             color:white;
             ">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="badge bg-light text-primary rounded-pill px-3 py-2 mb-3">

                        Dashboard Camat

                    </span>

                    <h1 class="fw-bold mb-3">

                        Monitoring Pengaduan

                    </h1>

                    <p class="mb-0 fs-5"
                       style="opacity:0.9;">

                        Pantau seluruh pengaduan masyarakat
                        Kecamatan Parigi Tengah secara realtime.

                    </p>

                </div>

                <div class="col-lg-4 text-center">

                    <div style="font-size:90px;">

                        📊

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- FILTER -->
    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;">

        <div class="card-body p-4">

            <form method="GET"
                  action="/camat/pengaduan">

                <div class="row g-3 align-items-end">

                    <!-- SEARCH -->
                    <div class="col-lg-5">

                        <label class="form-label fw-semibold text-primary">

                            Cari Pengaduan

                        </label>

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari judul pengaduan..."
                               value="{{ request('search') }}"
                               style="
                               height:50px;
                               border-radius:14px;
                               ">

                    </div>

                    <!-- STATUS -->
                    <div class="col-lg-4">

                        <label class="form-label fw-semibold text-primary">

                            Filter Status

                        </label>

                        <select name="status"
                                class="form-select"
                                style="
                                height:50px;
                                border-radius:14px;
                                ">

                            <option value="">
                                Semua Status
                            </option>

                            <option value="pending"
                                {{ request('status') == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="diproses"
                                {{ request('status') == 'diproses' ? 'selected' : '' }}>
                                Diproses
                            </option>

                            <option value="selesai"
                                {{ request('status') == 'selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                            <option value="ditolak"
                                {{ request('status') == 'ditolak' ? 'selected' : '' }}>
                                Ditolak
                            </option>

                        </select>

                    </div>

                    <!-- BUTTON -->
                    <div class="col-lg-3">

                        <div class="d-flex gap-2">

                            <button class="btn btn-primary flex-fill shadow-sm"
                                    style="
                                    height:50px;
                                    border-radius:14px;
                                    ">

                                <i class="bi bi-funnel-fill me-1"></i>

                                Filter

                            </button>

                            <a href="/camat/pengaduan"
                               class="btn btn-secondary shadow-sm"
                               style="
                               height:50px;
                               width:50px;
                               border-radius:14px;
                               display:flex;
                               align-items:center;
                               justify-content:center;
                               ">

                                <i class="bi bi-arrow-clockwise"></i>

                            </a>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- PDF -->
    <div class="mb-4">

        <a href="{{ url('/camat/pengaduan-pdf?search='.request('search').'&status='.request('status')) }}"
           class="btn btn-danger shadow-sm rounded-pill px-4 py-2">

            <i class="bi bi-file-earmark-pdf-fill me-2"></i>

            Cetak PDF

        </a>

    </div>

    <!-- TABLE -->
    <div class="card border-0 shadow-sm"
         style="border-radius:20px;">

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead style="
                           background:#f8fafc;
                           ">

                        <tr>

                            <th class="text-center">
                                No
                            </th>

                            <th>
                                Pelapor
                            </th>

                            <th>
                                Judul Pengaduan
                            </th>

                            <th class="text-center">
                                Status
                            </th>

                            <th class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pengaduan as $item)

                        <tr>

                            <!-- NO -->
                            <td class="text-center fw-semibold text-muted">

                                {{ $loop->iteration }}

                            </td>

                            <!-- PELAPOR -->
                            <td>

                                <div class="fw-semibold text-dark">

                                    {{ $item->user->name }}

                                </div>

                            </td>

                            <!-- JUDUL -->
                            <td>

                                <div class="fw-semibold text-dark">

                                    {{ $item->judul }}

                                </div>

                            </td>

                            <!-- STATUS -->
                            <td class="text-center">

                                @if($item->status == 'pending')

                                    <span class="badge rounded-pill px-3 py-2"
                                          style="
                                          background:#fff7ed;
                                          color:#ea580c;
                                          font-weight:600;
                                          ">

                                        Pending

                                    </span>

                                @elseif($item->status == 'diproses')

                                    <span class="badge rounded-pill px-3 py-2"
                                          style="
                                          background:#eff6ff;
                                          color:#2563eb;
                                          font-weight:600;
                                          ">

                                        Diproses

                                    </span>

                                @elseif($item->status == 'selesai')

                                    <span class="badge rounded-pill px-3 py-2"
                                          style="
                                          background:#ecfdf5;
                                          color:#16a34a;
                                          font-weight:600;
                                          ">

                                        Selesai

                                    </span>

                                @else

                                    <span class="badge rounded-pill px-3 py-2"
                                          style="
                                          background:#fef2f2;
                                          color:#dc2626;
                                          font-weight:600;
                                          ">

                                        Ditolak

                                    </span>

                                @endif

                            </td>

                            <!-- AKSI -->
                            <td class="text-center">

                                <a href="/camat/pengaduan/{{ $item->id }}"
                                   class="btn btn-sm shadow-sm border-0"
                                   title="Detail"
                                   style="
                                   width:35px;
                                   height:35px;
                                   border-radius:10px;
                                   background:#0ea5e9;
                                   color:white;
                                   display:flex;
                                   align-items:center;
                                   justify-content:center;
                                   margin:auto;
                                   ">

                                    <i class="bi bi-eye-fill"></i>

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-5 text-muted">

                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>

                                Tidak ada data pengaduan

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- PAGINATION -->
    <div class="mt-4">

        {{ $pengaduan->links() }}

    </div>

</div>

@endsection

