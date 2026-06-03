<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - SIPMAS</title>

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
            font-family:'Poppins',sans-serif;
        }

        body{

            min-height:100vh;

            display:flex;

            justify-content:center;

            align-items:center;

            overflow:hidden;

            background:
            linear-gradient(
            rgba(37,99,235,0.90),
            rgba(30,64,175,0.95)
            ),

            url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1600');

            background-size:cover;

            background-position:center;

            position:relative;
        }

        /* BUBBLE */

        .bubble1{

            position:absolute;

            width:350px;
            height:350px;

            border-radius:50%;

            background:
            rgba(255,255,255,0.08);

            top:-100px;
            right:-80px;
        }

        .bubble2{

            position:absolute;

            width:250px;
            height:250px;

            border-radius:50%;

            background:
            rgba(255,255,255,0.05);

            bottom:-80px;
            left:-60px;
        }

        /* CARD */

        .login-card{

            width:100%;

            max-width:430px;

            background:
            rgba(255,255,255,0.12);

            backdrop-filter:blur(16px);

            border:
            1px solid rgba(255,255,255,0.18);

            border-radius:35px;

            padding:45px;

            position:relative;

            z-index:5;

            box-shadow:
            0 15px 40px rgba(0,0,0,0.25);
        }

        .logo{

            width:90px;
            height:90px;

            background:white;

            border-radius:25px;

            display:flex;

            align-items:center;

            justify-content:center;

            margin:auto;

            margin-bottom:25px;

            color:#2563eb;

            font-size:38px;
        }

        .title{

            color:white;

            font-size:34px;

            font-weight:700;
        }

        .subtitle{

            color:
            rgba(255,255,255,0.8);

            margin-top:10px;
        }

        /* FORM */

        .form-label{

            color:white;

            font-weight:500;
        }

        .input-group{

            background:white;

            border-radius:16px;

            overflow:hidden;
        }

        .input-group-text{

            background:white;

            border:none;

            color:#2563eb;
        }

        .form-control{

            border:none;

            height:55px;
        }

        .form-control:focus{

            box-shadow:none;
        }

        /* BUTTON */

        .btn-login{

            height:55px;

            border:none;

            border-radius:16px;

            background:white;

            color:#2563eb;

            font-weight:700;

            transition:0.3s;
        }

        .btn-login:hover{

            transform:translateY(-3px);
        }

        .btn-back{

            height:55px;

            border-radius:16px;

            border:2px solid rgba(255,255,255,0.5);

            color:white;

            font-weight:600;

            transition:0.3s;
        }

        .btn-back:hover{

            background:white;

            color:#2563eb;
        }

    </style>

</head>

<body>

<div class="bubble1"></div>
<div class="bubble2"></div>

<div class="login-card">

    <!-- LOGO -->

    <div class="logo">

        <i class="bi bi-buildings-fill"></i>

    </div>

    <!-- TITLE -->

    <div class="text-center mb-4">

        <h2 class="title">

            SIPMAS

        </h2>

        <p class="subtitle">

            Login Sistem Pengaduan Masyarakat

        </p>

    </div>

    <!-- FORM -->

    <form action="/login"
          method="POST">

        @csrf

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
                       placeholder="Masukkan email">

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
                       placeholder="Masukkan password">

            </div>

        </div>

        <!-- BUTTON -->

        <div class="d-grid gap-3">

            <button type="submit"
                    class="btn btn-login">

                <i class="bi bi-box-arrow-in-right"></i>

                Login

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