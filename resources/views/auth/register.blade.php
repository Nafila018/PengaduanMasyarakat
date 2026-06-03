<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Register - SIPMAS</title>

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

        body{

            min-height:100vh;

            display:flex;

            align-items:center;

            justify-content:center;

            padding:20px;

            background:
            linear-gradient(
            rgba(37,99,235,0.92),
            rgba(30,64,175,0.94)
            ),

            url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1600');

            background-size:cover;

            background-position:center;
        }

        .register-card{

            width:100%;

            max-width:520px;

            background:
            rgba(255,255,255,0.12);

            backdrop-filter:blur(14px);

            border:
            1px solid rgba(255,255,255,0.18);

            border-radius:30px;

            padding:45px;

            box-shadow:
            0 15px 40px rgba(0,0,0,0.25);
        }

        .logo-icon{

            width:80px;
            height:80px;

            border-radius:25px;

            background:white;

            color:#2563eb;

            display:flex;

            align-items:center;

            justify-content:center;

            margin:auto auto 20px;

            font-size:38px;
        }

        .register-title{

            color:white;

            font-size:34px;

            font-weight:800;

            margin-bottom:8px;
        }

        .register-subtitle{

            color:
            rgba(255,255,255,0.82);

            font-size:15px;
        }

        .form-label{

            color:white;

            font-weight:500;

            margin-bottom:8px;
        }

        .form-control{

            height:56px;

            border:none;

            border-radius:16px;

            padding:0 18px;

            font-size:15px;

            background:
            rgba(255,255,255,0.92);
        }

        .form-control:focus{

            box-shadow:
            0 0 0 4px rgba(255,255,255,0.18);

            border:none;
        }

        .btn-register{

            background:white;

            color:#2563eb;

            border:none;

            height:56px;

            border-radius:16px;

            font-weight:700;

            transition:0.3s ease;

            box-shadow:
            0 10px 20px rgba(0,0,0,0.15);
        }

        .btn-register:hover{

            transform:translateY(-2px);

            background:#eff6ff;
        }

        .btn-back{

            border:2px solid rgba(255,255,255,0.7);

            color:white;

            border-radius:16px;

            height:56px;

            font-weight:600;

            transition:0.3s ease;
        }

        .btn-back:hover{

            background:white;

            color:#2563eb;
        }

        .input-group-text{

            border:none;

            background:
            rgba(255,255,255,0.92);

            border-radius:16px 0 0 16px;

            color:#2563eb;
        }

        .input-group .form-control{

            border-radius:0 16px 16px 0;
        }

        @media(max-width:576px){

            .register-card{

                padding:35px 25px;
            }

            .register-title{

                font-size:28px;
            }
        }

    </style>

</head>

<body>

<div class="register-card">

    <div class="text-center mb-4">

        <div class="logo-icon">

            <i class="bi bi-buildings-fill"></i>

        </div>

        <h2 class="register-title">

            SIPMAS

        </h2>

        <p class="register-subtitle">

            Registrasi Sistem Pengaduan Masyarakat

        </p>

    </div>

    {{-- ERROR VALIDASI --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('register') }}"
          method="POST">

        @csrf

        <!-- NAMA -->

        <div class="mb-3">

            <label class="form-label">

                Nama Lengkap

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="bi bi-person-fill"></i>

                </span>

                <input type="text"
                       name="name"
                       class="form-control"
                       placeholder="Masukkan nama lengkap"
                       required>

            </div>

        </div>

        <!-- EMAIL -->

        <div class="mb-3">

            <label class="form-label">

                Email

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="bi bi-envelope-fill"></i>

                </span>

                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Masukkan email"
                       required>

            </div>

        </div>

        <!-- PASSWORD -->

        <div class="mb-4">

            <label class="form-label">

                Password

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="bi bi-lock-fill"></i>

                </span>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Masukkan password"
                       required>

            </div>

        </div>

        <!-- BUTTON -->

        <div class="d-grid gap-3">

            <button type="submit"
                    class="btn btn-register">

                <i class="bi bi-person-plus-fill"></i>

                Register

            </button>

            <a href="/"
               class="btn btn-back">

                <i class="bi bi-arrow-left"></i>

                Kembali

            </a>

        </div>

    </form>

</div>

</body>
</html>