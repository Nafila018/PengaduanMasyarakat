@extends('layouts.camat')

@section('title', 'Monitoring Pengaduan')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h3 class="fw-bold">
            Monitoring Pengaduan
        </h3>

        <p class="text-muted">
            Monitoring seluruh pengaduan masyarakat secara realtime.
        </p>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Tanggal</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pengaduans as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                @if($item->foto)

                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                         width="70"
                                         class="rounded-3 border">

                                @else

                                    <span class="text-muted">
                                        Tidak ada foto
                                    </span>

                                @endif

                            </td>

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

                            <td colspan="6"
                                class="text-center text-muted py-4">

                                Belum ada pengaduan masyarakat.

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

