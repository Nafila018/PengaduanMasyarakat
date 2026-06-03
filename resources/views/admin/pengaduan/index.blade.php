@extends('layouts.app')
@section('content') 

@php use Illuminate\Support\Facades\Storage; @endphp

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">

                Kelola Pengaduan

            </h2>

            <small class="text-muted">

                Monitoring dan verifikasi pengaduan masyarakat

            </small>

        </div>

    </div>

    <!-- SEARCH -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-lg-4">

                        <input type="text"
                               name="search"
                               class="form-control rounded-pill"
                               placeholder="Cari judul pengaduan...">

                    </div>

                    <div class="col-lg-2">

                        <button class="btn btn-primary rounded-pill px-4">

                            <i class="bi bi-search"></i>

                            Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- ALERT -->
    @if(session('success'))

        <div class="alert alert-success border-0 rounded-4 shadow-sm">

            {{ session('success') }}

        </div>

    @endif

    <!-- TABLE -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead style="
                       background:#2563eb;
                       color:white;
                       ">

                    <tr>

                        <th class="ps-4">

                            No

                        </th>

                        <th>

                            Pelapor

                        </th>

                        <th>

                            Alamat

                        </th>

                        <th>

                            Judul

                        </th>

                        <th>

                            Foto

                        </th>

                        <th>

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
                        <td class="ps-4 fw-semibold">

                            {{ $loop->iteration }}

                        </td>

                        <!-- NAMA -->
                        <td>

                            <div class="fw-semibold">

                                {{ $item->user->name }}

                            </div>

                            <small class="text-muted">

                                {{ $item->user->email }}

                            </small>

                        </td>

                        <!-- ALAMAT -->
                        <td>

                            {{ $item->user->alamat ?? '-' }}

                        </td>

                        <!-- JUDUL -->
                        <td>

                            <div class="fw-semibold">

                                {{ $item->judul }}

                            </div>

                            <small class="text-muted">

                                {{ Str::limit(
                                    $item->isi_laporan,
                                    50
                                ) }}

                            </small>

                        </td>

<!-- FOTO -->
<td>

    @if($item->foto)

        <img src="{{ Storage::url($item->foto) }}"
             width="90"
             height="70"
             alt="foto pengaduan"
             style="
             object-fit:cover;
             border-radius:12px;
             border:1px solid #ddd;
             ">

    @else

        <span class="text-muted">

            Tidak ada foto

        </span>

    @endif

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

                        <!-- AKSI -->
                        <td>

                            <div class="d-flex justify-content-center gap-2">

                                <!-- DETAIL -->
                                <a href="/admin/pengaduan/{{ $item->id }}"
                                   class="btn btn-primary btn-sm rounded-pill">

                                    <i class="bi bi-eye-fill"></i>

                                <!-- TANGGAPAN -->
                                 <a href="/admin/tanggapan/{{ $item->id }}"
                                class="btn btn-success btn-sm rounded-pill">

                                    <i class="bi bi-chat-dots-fill"></i>

                            </a>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7"
                            class="text-center py-5 text-muted">

                            <i class="bi bi-inbox-fill"
                               style="font-size:55px;"></i>

                            <br><br>

                            Belum ada pengaduan masyarakat

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        <div class="p-4">

            {{ $pengaduan->links() }}

        </div>

    </div>

</div>

@endsection