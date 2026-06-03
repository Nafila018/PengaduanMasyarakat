@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                Data Tanggapan

            </h2>

            <small class="text-muted">

                Tanggapan admin kepada masyarakat

            </small>

        </div>

    </div>

    <!-- ALERT -->
    @if(session('success'))

        <div class="alert alert-success rounded-4">

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

                        <th>No</th>
                        <th>Pelapor</th>
                        <th>Judul Pengaduan</th>
                        <th>Tanggapan</th>
                        <th>Tanggal</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($tanggapan as $item)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            {{ $item->pengaduan->user->name }}

                        </td>

                        <td>

                            {{ $item->pengaduan->judul }}

                        </td>

                        <td>

                            {{ $item->tanggapan }}

                        </td>

                        <td>

                            {{ $item->created_at->format('d M Y') }}

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-5">

                            Belum ada tanggapan

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection