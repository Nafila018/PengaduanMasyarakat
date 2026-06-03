@extends('layouts.camat')

@section('title', 'Persetujuan Pengaduan')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h3 class="fw-bold">
            Persetujuan Pengaduan
        </h3>

        <p class="text-muted">
            Setujui atau tolak pengaduan masyarakat.
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

                                @if($item->status == 'pending')

                                    <span class="badge bg-warning">
                                        Pending
                                    </span>

                                @elseif($item->status == 'selesai')

                                    <span class="badge bg-success">
                                        Selesai
                                    </span>

                                @elseif($item->status == 'ditolak')

                                    <span class="badge bg-danger">
                                        Ditolak
                                    </span>

                                @else

                                    <span class="badge bg-info">
                                        Diproses
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="d-flex gap-2">

                                    {{-- SETUJUI --}}
                                    <form action="{{ route('camat.setujui', $item->id) }}"
                                    method="POST">

                                    @csrf

                                    <button type="submit"
                                            class="btn btn-success">

                                        Setujui

                                    </button>

                                </form>

                                    {{-- TOLAK --}}
                                    <form action="{{ route('camat.tolak', $item->id) }}"
                                        method="POST">

                                        @csrf

                                        <button type="submit"
                                                class="btn btn-danger">

                                            Tolak

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center text-muted py-4">

                                Belum ada pengaduan.

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
