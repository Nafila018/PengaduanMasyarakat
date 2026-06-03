@extends('layouts.masyarakat')

@section('content')

<div class="container py-4">

    <div class="card shadow border-0">

        <div class="card-body">

            <h3 class="fw-bold text-primary mb-4">

                Detail Pengaduan

            </h3>

            <div class="mb-3">

                <strong>Judul :</strong>

                <br>

                {{ $pengaduan->judul }}

            </div>

            <div class="mb-3">

                <strong>Isi Laporan :</strong>

                <br>

                {{ $pengaduan->isi_laporan }}

            </div>

            <div class="mb-3">

                <strong>Status :</strong>

                <br>

                {{ $pengaduan->status }}

            </div>

            @if($pengaduan->foto)

            <div class="mb-3">

                <strong>Foto :</strong>

                <br><br>

                <img src="{{ asset('storage/' . $pengaduan->foto) }}"
                     class="img-fluid rounded shadow"
                     width="300">

            </div>

            @endif

            <a href="/masyarakat/pengaduan"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection

