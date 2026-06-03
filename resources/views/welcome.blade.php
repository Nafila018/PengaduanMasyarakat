<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        SIPMAS - Sistem Pengaduan Masyarakat
    </title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        html{
            scroll-behavior:smooth;
        }

        body{
            overflow-x:hidden;
            background:#f8fafc;
            color:#1e293b;
        }

        a{
            text-decoration:none;
        }

        /* ================= NAVBAR ================= */

        .navbar{
            padding:16px 0;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(14px);
            border-bottom:1px solid rgba(255,255,255,0.1);
            transition:0.3s;
        }

        .navbar-brand{
            color:white !important;
            font-size:30px;
            font-weight:800;
            letter-spacing:1px;
        }

        .nav-link{
            color:white !important;
            margin-left:15px;
            font-weight:500;
            transition:0.3s;
            position:relative;
        }

        .nav-link::after{
            content:'';
            position:absolute;
            left:0;
            bottom:-5px;
            width:0;
            height:2px;
            background:white;
            transition:0.3s;
        }

        .nav-link:hover::after{
            width:100%;
        }

        .nav-link:hover{
            color:#dbeafe !important;
        }

        /* ================= BUTTON ================= */

        .btn-login{
            background:white;
            color:#2563eb;
            padding:11px 28px;
            border-radius:50px;
            font-weight:600;
            border:none;
            transition:0.3s ease;
            box-shadow:0 4px 14px rgba(0,0,0,0.1);
        }

        .btn-login:hover{
            transform:translateY(-2px);
            background:#eff6ff;
        }

        .btn-register{
            border:2px solid rgba(255,255,255,0.8);
            color:white;
            padding:10px 28px;
            border-radius:50px;
            font-weight:600;
            transition:0.3s ease;
        }

        .btn-register:hover{
            background:white;
            color:#2563eb;
            transform:translateY(-2px);
        }

        /* ================= HERO ================= */

        .hero{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            position:relative;
            overflow:hidden;
            text-align:center;
            padding:120px 20px 80px;

            background:
            linear-gradient(
            135deg,
            rgba(37,99,235,0.92),
            rgba(30,64,175,0.95)
            ),
            url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1600');

            background-size:cover;
            background-position:center;
        }

        /* ================= BUBBLE ================= */

        .bubble1,
        .bubble2{
            position:absolute;
            border-radius:50%;
            background:rgba(255,255,255,0.05);
        }

        .bubble1{
            width:420px;
            height:420px;
            top:-140px;
            right:-120px;
        }

        .bubble2{
            width:300px;
            height:300px;
            bottom:-100px;
            left:-80px;
        }

        .hero-content{
            position:relative;
            z-index:5;
            max-width:950px;
            margin:auto;
        }

        .hero h1{
            font-size:68px;
            font-weight:800;
            color:white;
            line-height:1.2;
            margin-bottom:20px;
        }

        .hero p{
            color:rgba(255,255,255,0.92);
            font-size:18px;
            line-height:1.9;
            max-width:760px;
            margin:0 auto 35px;
        }

        /* ================= HERO BUTTON ================= */

        .btn-main{
            background:white;
            color:#2563eb;
            padding:15px 38px;
            border-radius:50px;
            font-weight:700;
            border:none;
            transition:0.3s ease;
            box-shadow:0 8px 20px rgba(0,0,0,0.15);
        }

        .btn-main:hover{
            transform:translateY(-3px);
            background:#eff6ff;
        }

        .btn-outline-custom{
            border:2px solid rgba(255,255,255,0.7);
            color:white;
            padding:13px 38px;
            border-radius:50px;
            font-weight:600;
            transition:0.3s ease;
        }

        .btn-outline-custom:hover{
            background:white;
            color:#2563eb;
        }

        /* ================= GLASS ================= */

        .glass-box{
            margin-top:50px;
            background:rgba(255,255,255,0.12);
            backdrop-filter:blur(14px);
            border:1px solid rgba(255,255,255,0.15);
            border-radius:30px;
            padding:35px;
            max-width:850px;
            margin-left:auto;
            margin-right:auto;
            box-shadow:0 15px 40px rgba(0,0,0,0.15);
        }

        .glass-box h4{
            color:white;
            font-weight:700;
            margin-bottom:15px;
        }

        .glass-box p{
            color:rgba(255,255,255,0.88);
            line-height:1.9;
            margin-bottom:0;
        }

        /* ================= FITUR ================= */

        .fitur{
            padding:110px 0;
        }

        .section-title{
            font-size:45px;
            font-weight:800;
            color:#0f172a;
        }

        .section-subtitle{
            color:#64748b;
            line-height:2;
            max-width:700px;
            margin:auto;
        }

        .feature-card{
            background:white;
            border:none;
            border-radius:30px;
            padding:45px 35px;
            transition:0.3s ease;
            text-align:center;
            height:100%;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
        }

        .feature-card:hover{
            transform:translateY(-10px);
            box-shadow:0 16px 40px rgba(0,0,0,0.08);
        }

        .icon-box{
            width:85px;
            height:85px;
            border-radius:25px;
            background:#2563eb;
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto auto 25px;
            font-size:35px;
        }

        /* ================= FOOTER ================= */

        footer{
            background:#0f172a;
            color:white;
            padding:40px 0;
            text-align:center;
        }

        .footer-text{
            opacity:0.7;
        }

        /* ================= MOBILE ================= */

        @media(max-width:991px){

            .hero{
                text-align:center;
                padding-top:150px;
                padding-bottom:100px;
            }

            .hero h1{
                font-size:50px;
            }

            .hero p{
                font-size:17px;
            }
        }

        @media(max-width:768px){

            .hero h1{
                font-size:40px;
            }

            .hero p{
                font-size:16px;
            }

            .btn-main,
            .btn-outline-custom,
            .btn-login,
            .btn-register{
                width:100%;
            }

            .section-title{
                font-size:35px;
            }
        }

    </style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg fixed-top">

    <div class="container">

        <a class="navbar-brand"
           href="/">

            <i class="bi bi-buildings-fill"></i>

            SIPMAS

        </a>

        <button class="navbar-toggler bg-white"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item">

                    <a class="nav-link"
                       href="#fitur">

                        Fitur

                    </a>

                </li>

                <li class="nav-item ms-3">

                    <a href="/login"
                       class="btn btn-login">

                        Login

                    </a>

                </li>

                <li class="nav-item ms-2">

                    <a href="/register"
                       class="btn btn-register">

                        Register

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- HERO -->

<section class="hero">

    <div class="bubble1"></div>
    <div class="bubble2"></div>

    <div class="container hero-content">

        <div class="row justify-content-center">

            <div class="col-lg-10 text-center">

                <h1>

                    Sistem Pengaduan
                    Masyarakat Desa

                </h1>

                <p>

                    SIPMAS merupakan layanan digital
                    Kecamatan Parigi Tengah yang membantu
                    masyarakat menyampaikan pengaduan,
                    aspirasi, dan keluhan secara online
                    dengan lebih cepat, mudah,
                    aman, dan transparan.

                </p>

                <!-- GLASS -->

                <div class="glass-box">

                    <h4>
                        Pelayanan Publik Modern
                    </h4>

                    <p>

                        Sistem pengaduan masyarakat berbasis digital
                        untuk meningkatkan kualitas pelayanan publik
                        yang lebih responsif dan mudah dipantau oleh masyarakat.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- FITUR -->

<section class="fitur bg-white"
         id="fitur">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                Fitur Sistem

            </h2>

            <p class="section-subtitle mt-3">

                Sistem dirancang untuk memberikan kemudahan
                masyarakat dalam menyampaikan pengaduan
                secara online.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="icon-box">

                        <i class="bi bi-send-fill"></i>

                    </div>

                    <h5 class="fw-bold">

                        Pengaduan Online

                    </h5>

                    <p class="text-muted mt-3">

                        Pengaduan dapat dikirim kapan saja
                        dengan mudah melalui sistem.

                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="icon-box">

                        <i class="bi bi-chat-dots-fill"></i>

                    </div>

                    <h5 class="fw-bold">

                        Tanggapan Admin

                    </h5>

                    <p class="text-muted mt-3">

                        Admin memberikan respon dan
                        tindak lanjut pengaduan masyarakat.

                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="icon-box">

                        <i class="bi bi-shield-check"></i>

                    </div>

                    <h5 class="fw-bold">

                        Transparan

                    </h5>

                    <p class="text-muted mt-3">

                        Status pengaduan dapat dipantau
                        langsung oleh masyarakat.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- FOOTER -->

<footer>

    <div class="container text-center">

        <h5 class="fw-bold">

            SIPMAS

        </h5>

        <p class="footer-text mb-0">

            Sistem Pengaduan Masyarakat Desa
            Kecamatan Parigi Tengah © 2026

        </p>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>