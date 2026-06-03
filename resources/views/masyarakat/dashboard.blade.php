@extends('layouts.masyarakat')

@section('content')

<style>

    body{
        background:#f1f5f9;
    }

    /* ================= HERO ================= */

    .hero-dashboard{

        background:
        linear-gradient(
        135deg,
        #2563eb,
        #1e40af
        );

        border-radius:35px;

        padding:55px;

        color:white;

        position:relative;

        overflow:hidden;

        box-shadow:0 20px 50px rgba(37,99,235,0.25);
    }

    .hero-dashboard::before{

        content:'';

        position:absolute;

        width:250px;
        height:250px;

        background:rgba(255,255,255,0.08);

        border-radius:50%;

        top:-80px;
        right:-80px;
    }

    .hero-dashboard::after{

        content:'';

        position:absolute;

        width:180px;
        height:180px;

        background:rgba(255,255,255,0.05);

        border-radius:50%;

        bottom:-60px;
        left:-60px;
    }

    .hero-title{

        font-size:42px;

        font-weight:800;
    }

    .hero-subtitle{

        font-size:17px;

        opacity:0.9;

        max-width:650px;

        line-height:1.8;
    }

    .hero-icon-wrapper{

        width:170px;
        height:170px;

        background:rgba(255,255,255,0.15);

        border-radius:35px;

        display:flex;
        align-items:center;
        justify-content:center;

        margin:auto;

        backdrop-filter:blur(10px);
    }

    .hero-icon{

        font-size:75px;

        color:white;
    }

    /* ================= STATS ================= */

    .stats-card{

        border:none;

        border-radius:28px;

        padding:30px;

        color:white;

        display:flex;
        justify-content:space-between;
        align-items:center;

        transition:0.3s ease;

        overflow:hidden;

        position:relative;

        min-height:140px;

        box-shadow:0 10px 30px rgba(0,0,0,0.08);
    }

    .stats-card:hover{

        transform:translateY(-8px);
    }

    .stats-card p{

        margin-bottom:10px;

        font-size:15px;

        opacity:0.9;
    }

    .stats-card h2{

        font-size:40px;

        font-weight:800;
    }

    .stats-icon{

        font-size:60px;

        opacity:0.25;
    }

    /* ================= CARD ================= */

    .modern-card{

        border:none;

        border-radius:30px;

        overflow:hidden;

        box-shadow:0 10px 30px rgba(0,0,0,0.05);
    }

    .modern-header{

        background:white;

        padding:25px 30px;

        border-bottom:1px solid #e2e8f0;
    }

    .modern-body{

        padding:30px;
    }

    /* ================= RESPONSE ================= */

    .response-item{

        background:#f8fafc;

        border-radius:22px;

        padding:25px;

        margin-bottom:20px;

        transition:0.3s;
    }

    .response-item:hover{

        background:#eff6ff;

        transform:translateY(-3px);
    }

    .response-top{

        display:flex;
        justify-content:space-between;
        align-items:center;

        margin-bottom:15px;
    }

    .response-message{

        color:#475569;

        line-height:1.8;
    }

    /* ================= QUICK MENU ================= */

    .menu-card{

        background:white;

        border-radius:25px;

        padding:30px;

        text-align:center;

        transition:0.3s;

        text-decoration:none;

        display:block;

        color:#0f172a;

        box-shadow:0 8px 25px rgba(0,0,0,0.05);
    }

    .menu-card:hover{

        transform:translateY(-8px);

        color:#2563eb;
    }

    .menu-icon{

        width:80px;
        height:80px;

        background:#2563eb;

        color:white;

        border-radius:22px;

        display:flex;
        align-items:center;
        justify-content:center;

        margin:auto auto 20px;

        font-size:34px;
    }

    @media(max-width:768px){

        .hero-dashboard{
            padding:35px;
            text-align:center;
        }

        .hero-title{
            font-size:32px;
        }

        .hero-icon-wrapper{
            margin-top:30px;
        }
    }

</style>

<div class="container-fluid py-4">

    {{-- ALERT --}}
    @if(session('success'))

    <div class="alert alert-success border-0 rounded-4 shadow-sm">

        {{ session('success') }}

    </div>

    @endif


    {{-- HERO --}}
    <div class="hero-dashboard mb-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-light text-primary px-3 py-2 rounded-pill mb-3">

                    Sistem Pengaduan Masyarakat

                </span>

                <h1 class="hero-title">

                    Selamat Datang 👋

                </h1>

                <p class="hero-subtitle">

                    Pantau seluruh pengaduan masyarakat
                    secara realtime, cepat, aman,
                    dan transparan melalui dashboard SIPMAS.

                </p>

            </div>

            <div class="col-lg-4">

                <div class="hero-icon-wrapper">

                    <i class="bi bi-megaphone-fill hero-icon"></i>

                </div>

            </div>

        </div>

    </div>


    {{-- STATISTIK --}}
    <div class="row g-4 mb-5">

        <div class="col-lg-3 col-md-6">

            <div class="stats-card bg-primary">

                <div>

                    <p>Total Pengaduan</p>

                    <h2>{{ $total }}</h2>

                </div>

                <i class="bi bi-file-earmark-text-fill stats-icon"></i>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="stats-card bg-warning">

                <div>

                    <p>Pending</p>

                    <h2>{{ $pending }}</h2>

                </div>

                <i class="bi bi-hourglass-split stats-icon"></i>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="stats-card bg-info">

                <div>

                    <p>Diproses</p>

                    <h2>{{ $diproses }}</h2>

                </div>

                <i class="bi bi-gear-fill stats-icon"></i>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="stats-card bg-success">

                <div>

                    <p>Selesai</p>

                    <h2>{{ $selesai }}</h2>

                </div>

                <i class="bi bi-check-circle-fill stats-icon"></i>

            </div>

        </div>

    </div>


    {{-- MENU CEPAT --}}
    <div class="row g-4 mb-5">

        <div class="col-md-4">

            <a href="{{ route('masyarakat.pengaduan.create') }}"
               class="menu-card">

                <div class="menu-icon">

                    <i class="bi bi-plus-circle-fill"></i>

                </div>

                <h5 class="fw-bold">

                    Buat Pengaduan

                </h5>

            </a>

        </div>

        <div class="col-md-4">

            <a href="{{ route('masyarakat.progress') }}"
               class="menu-card">

                <div class="menu-icon">

                    <i class="bi bi-graph-up-arrow"></i>

                </div>

                <h5 class="fw-bold">

                    Lihat Progress

                </h5>

            </a>

        </div>

        <div class="col-md-4">

            <a href="{{ route('masyarakat.profile') }}"
               class="menu-card">

                <div class="menu-icon">

                    <i class="bi bi-person-circle"></i>

                </div>

                <h5 class="fw-bold">

                    Profile Saya

                </h5>

            </a>

        </div>

    </div>


    {{-- TANGGAPAN --}}
    <div class="modern-card">

        <div class="modern-header">

            <h4 class="fw-bold mb-1">

                Tanggapan Admin

            </h4>

            <small class="text-muted">

                Update terbaru dari admin

            </small>

        </div>

        <div class="modern-body">

            @forelse($tanggapans as $item)

            <div class="response-item">

                <div class="response-top">

                    <h5 class="fw-bold mb-0">

                        {{ $item->pengaduan->judul ?? '-' }}

                    </h5>

                    <span class="badge bg-primary">

                        {{ ucfirst($item->pengaduan->status ?? '-') }}

                    </span>

                </div>

                <div class="response-message">

                    {{ $item->tanggapan }}

                </div>

            </div>

            @empty

            <div class="text-center text-muted py-5">

                Belum ada tanggapan admin

            </div>

            @endforelse

        </div>

    </div>

</div>

@endsection
