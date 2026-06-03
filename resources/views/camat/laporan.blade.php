@extends('layouts.camat')

@section('title', 'Laporan Pengaduan')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h3 class="fw-bold">
            Laporan Pengaduan
        </h3>

        <p class="text-muted">
            Rekap seluruh pengaduan masyarakat.
        </p>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>No</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>


                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pengaduans as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->user->name ?? '-' }}
                            </td>

                            <td>
                                {{ $item->judul }}
                            </td>

                            <td>

                                @if($item->status == 'selesai')

                                    <span class="badge bg-success">
                                        Selesai
                                    </span>

                                @elseif($item->status == 'pending')

                                    <span class="badge bg-warning">
                                        Pending
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
                                <td>

                                <a href="{{ route('camat.pengaduan.pdf', $item->id) }}"
                                class="btn btn-danger btn-sm">

                                    <i class="bi bi-file-earmark-pdf"></i>

                                    PDF

                                </a>

</td>
                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center text-muted py-4">

                                Belum ada laporan.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection

