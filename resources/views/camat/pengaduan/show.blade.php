@extends('layouts.camat')

@section('content')

<h1>Detail Pengaduan</h1>

<div class="card mb-4">

    <div class="card-body">

        <h3>{{ $pengaduan->judul }}</h3>

        <hr>

        <p>

            <strong>Pelapor :</strong>

            {{ $pengaduan->user->name }}

        </p>

        <p>

            <strong>Status :</strong>

            {{ $pengaduan->status }}

        </p>
        
        <p>

            {{ $pengaduan->isi_laporan }}

        </p>

        @if($pengaduan->foto)

            <img src="{{ asset('storage/'.$pengaduan->foto) }}"
                 width="300">

        @endif

    </div>

</div>

<h3>Riwayat Tanggapan Admin</h3>

@forelse($pengaduan->tanggapan as $item)

    <div class="card mb-3">

        <div class="card-body">

            <h5>{{ $item->user->name }}</h5>

            <small>

                {{ $item->created_at->format('d M Y H:i') }}

            </small>

            <hr>

            <p>{{ $item->tanggapan }}</p>

            @if($item->foto)

                <img src="{{ asset('storage/'.$item->foto) }}"
                     width="200">

            @endif

        </div>

    </div>

@empty

    <div class="alert alert-warning">

        Belum ada tanggapan admin

    </div>

@endforelse

@endsection