<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Dashboard Masyarakat
    </title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- BOOTSTRAP ICON --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- GOOGLE FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        *{
            font-family:'Poppins', sans-serif;
        }

        body{
            background:#f4f7fe;
            margin:0;
            padding:0;
            overflow-x:hidden;
        }

        .wrapper{
            display:flex;
            min-height:100vh;
        }

        /*
        |--------------------------------------------------------------------------
        | SIDEBAR
        |--------------------------------------------------------------------------
        */

        .sidebar{
            width:280px;
            background:linear-gradient(180deg, #0d6efd, #0b5ed7);
            color:white;
            position:fixed;
            top:0;
            left:0;
            bottom:0;
            padding:30px 20px;
            overflow-y:auto;
            z-index:1000;
            box-shadow:0 0 25px rgba(0,0,0,0.08);
        }

        .sidebar-brand{
            text-align:center;
            margin-bottom:40px;
        }

        .sidebar-brand .logo-icon{
            width:90px;
            height:90px;
            border-radius:25px;
            background:rgba(255,255,255,0.15);
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto;
            font-size:45px;
        }

        .sidebar-brand h3{
            font-weight:700;
            margin-top:20px;
            margin-bottom:8px;
        }

        .sidebar-brand p{
            opacity:0.8;
            font-size:14px;
            line-height:1.6;
        }

        .sidebar-menu{
            display:flex;
            flex-direction:column;
            gap:10px;
        }

        .sidebar-menu a{
            text-decoration:none;
            color:white;
            padding:15px 18px;
            border-radius:16px;
            display:flex;
            align-items:center;
            gap:15px;
            transition:0.3s;
            font-weight:500;
        }

        .sidebar-menu a:hover{
            background:rgba(255,255,255,0.15);
            transform:translateX(5px);
        }

        .sidebar-menu a.active{
            background:white;
            color:#0d6efd;
            font-weight:600;
            box-shadow:0 10px 20px rgba(0,0,0,0.08);
        }

        .sidebar-menu i{
            font-size:20px;
        }

        .sidebar-logout{
            border:none;
            background:transparent;
            color:white;
            width:100%;
            text-align:left;
            padding:15px 18px;
            border-radius:16px;
            display:flex;
            align-items:center;
            gap:15px;
            transition:0.3s;
            font-weight:500;
            margin-top:10px;
        }

        .sidebar-logout:hover{
            background:rgba(255,255,255,0.15);
            transform:translateX(5px);
        }

        /*
        |--------------------------------------------------------------------------
        | CONTENT
        |--------------------------------------------------------------------------
        */

        .main-content{
            margin-left:280px;
            width:100%;
            padding:30px;
        }

        /*
        |--------------------------------------------------------------------------
        | TOPBAR
        |--------------------------------------------------------------------------
        */

        .topbar{
            background:white;
            border-radius:25px;
            padding:20px 25px;
            margin-bottom:30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
        }

        .topbar h4{
            margin:0;
            font-weight:700;
            color:#0d6efd;
        }

        .topbar small{
            color:#6c757d;
        }

        .user-info{
            display:flex;
            align-items:center;
            gap:15px;
        }

        .user-info img{
            width:50px;
            height:50px;
            border-radius:50%;
            object-fit:cover;
            border:3px solid #e9ecef;
        }

        .user-info strong{
            color:#212529;
        }

        /*
        |--------------------------------------------------------------------------
        | MOBILE
        |--------------------------------------------------------------------------
        */

        @media(max-width:991px){

            .wrapper{
                flex-direction:column;
            }

            .sidebar{
                position:relative;
                width:100%;
                height:auto;
                border-radius:0 0 30px 30px;
            }

            .main-content{
                margin-left:0;
                padding:20px;
            }

            .topbar{
                flex-direction:column;
                gap:20px;
                text-align:center;
            }

            .user-info{
                justify-content:center;
            }

        }

        @media(max-width:576px){

            .sidebar{
                padding:25px 15px;
            }

            .main-content{
                padding:15px;
            }

            .topbar{
                padding:20px;
            }

        }

    </style>

</head>

<body>

<div class="wrapper">

    {{-- SIDEBAR --}}
    <div class="sidebar">

        {{-- BRAND --}}
        <div class="sidebar-brand">

            <div class="logo-icon">
                <i class="bi bi-megaphone-fill"></i>
            </div>

            <h3>
                SIPM
            </h3>

            <p>
                Sistem Informasi Pengaduan Masyarakat
            </p>

        </div>


        {{-- MENU --}}
        <div class="sidebar-menu">

            {{-- DASHBOARD --}}
            <a href="{{ route('masyarakat.dashboard') }}"
               class="{{ request()->routeIs('masyarakat.dashboard') ? 'active' : '' }}">

                <i class="bi bi-speedometer2"></i>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- BUAT PENGADUAN --}}
            <a href="{{ route('masyarakat.pengaduan.create') }}"
               class="{{ request()->routeIs('pengaduan.create') ? 'active' : '' }}">

                <i class="bi bi-plus-circle"></i>

                <span>
                    Buat Pengaduan
                </span>

            </a>


            {{-- PENGADUAN SAYA --}}
            <a href="{{ route('masyarakat.pengaduan.index') }}"
               class="{{ request()->routeIs('pengaduan.index') ? 'active' : '' }}">

                <i class="bi bi-file-earmark-text"></i>

                <span>
                    Pengaduan Saya
                </span>

            </a>


            {{-- PROGRESS PENGADUAN --}}
            <a href="{{ route('masyarakat.progress') }}"
               class="{{ request()->routeIs('masyarakat.progress') ? 'active' : '' }}">

                <i class="bi bi-clock-history"></i>

                <span>
                    Progress Pengaduan
                </span>

            </a>


            {{-- PROFILE --}}
            <a href="{{ route('masyarakat.profile') }}"
               class="{{ request()->routeIs('masyarakat.profile') ? 'active' : '' }}">

                <i class="bi bi-person-circle"></i>

                <span>
                    Profile
                </span>

            </a>


            {{-- LOGOUT --}}
            <form action="{{ route('logout') }}"
                  method="POST">

                @csrf

                <button type="submit"
                        class="sidebar-logout">

                    <i class="bi bi-box-arrow-right"></i>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </div>


    {{-- CONTENT --}}
    <div class="main-content">

        {{-- TOPBAR --}}
        <div class="topbar">

            <div>

                <h4>
                    Dashboard Masyarakat
                </h4>

                <small>
                    Selamat datang kembali 👋
                </small>

            </div>


            <div class="user-info">

                <div class="text-end">

                    <strong>
                        {{ Auth::user()->name }}
                    </strong>

                    <br>

                    <small class="text-muted">
                        Masyarakat
                    </small>

                </div>

                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D6EFD&color=fff"
                     alt="Profile">

            </div>

        </div>


        {{-- CONTENT PAGE --}}
        @yield('content')

    </div>

</div>

{{-- BOOTSTRAP JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
