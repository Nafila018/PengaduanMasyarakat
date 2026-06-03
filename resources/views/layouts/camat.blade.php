<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background: #eef1f6;
    }

    /* ======================================
   SIDEBAR
====================================== */

    .sidebar {

        position: fixed;

        left: 0;
        top: 0;

        width: 280px;

        height: 100vh;

        background: linear-gradient(180deg,
                #1e3a8a,
                #2563eb);

        padding: 20px;

        display: flex;
        flex-direction: column;

        overflow-y: auto;

        z-index: 1500;
    }

    /* ======================================
   PROFILE
====================================== */

    .profile-card {

        background: rgba(255, 255, 255, .12);

        border-radius: 25px;

        padding: 25px;

        text-align: center;

        margin-bottom: 30px;
    }

    .profile-avatar {

        width: 100px;
        height: 100px;

        border-radius: 50%;

        background: white;

        margin: auto;

        display: flex;
        justify-content: center;
        align-items: center;

        font-size: 55px;
        font-weight: bold;

        color: #2563eb;

        margin-bottom: 15px;
    }

    .profile-card h4 {

        color: white;

        margin-bottom: 5px;

        font-weight: bold;
    }

    .profile-card p {

        color: #dbeafe;
    }

    /* ======================================
   MENU
====================================== */

    .menu-title {

        color: #dbeafe;

        font-size: 13px;

        text-transform: uppercase;

        letter-spacing: 1px;

        margin-bottom: 15px;
    }

    .sidebar-menu {

        flex: 1;
    }

    .sidebar-menu a {

        display: flex;

        align-items: center;

        gap: 15px;

        padding: 15px 18px;

        color: white;

        text-decoration: none;

        border-radius: 18px;

        margin-bottom: 10px;

        transition: .3s;
    }

    .sidebar-menu a:hover {

        background: rgba(255, 255, 255, .15);

        transform: translateX(5px);
    }

    .sidebar-menu a.active {

        background: rgba(255, 255, 255, .20);
    }

    .sidebar-menu i {

        width: 22px;

        text-align: center;
    }

    /* ======================================
   LOGOUT
====================================== */

    .logout-form {

        margin-top: auto;
    }

    .logout-btn {

        width: 100%;

        padding: 15px;

        border: none;

        border-radius: 18px;

        background: #ef4444;

        color: white;

        font-size: 17px;

        font-weight: bold;

        cursor: pointer;

        transition: .3s;
    }

    .logout-btn:hover {

        background: #dc2626;
    }

    /* ======================================
   CONTENT
====================================== */

    .content {

        margin-left: 280px;

        padding: 30px;
    }

    /* ======================================
   TOPBAR
====================================== */

    .topbar {

        background: white;

        border-radius: 25px;

        padding: 25px 35px;

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 30px;

        box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
    }

    .user-info {

        text-align: right;
    }

    /* ======================================
   CARD
====================================== */

    .card-custom {

        background: white;

        border-radius: 25px;

        padding: 25px;

        box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
    }


    /* ======================================
MOBILE COMPONENTS
====================================== */

    .menu-toggle {
        display: none;
    }

    .overlay {
        display: none;
    }

    .mobile-header {
        display: none;
    }

    /* ======================================
RESPONSIVE MOBILE
====================================== */

    @media(max-width:991px) {

        /* SIDEBAR */

        .sidebar {

            position: fixed;

            top: 0;
            left: -280px;

            width: 280px;

            height: 100vh;

            z-index: 1500;

            transition: all .3s ease;
        }

        .sidebar.show {
            left: 0;
        }

        /* OVERLAY */

        .overlay {

            position: fixed;

            top: 0;
            left: 0;

            width: 100%;
            height: 100%;

            background: rgba(0, 0, 0, .5);

            z-index: 1400;
        }

        .overlay.show {
            display: block;
        }

        /* CONTENT */

        .content {

            margin-left: 0 !important;

            width: 100%;

            padding: 15px;
        }

        /* MOBILE HEADER */

        .mobile-header {

            display: flex;

            align-items: center;

            gap: 15px;

            width: 100%;

            background: #fff;

            border-radius: 20px;

            padding: 15px 20px;

            margin-bottom: 20px;

            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        }

        .mobile-header span {

            font-size: 18px;

            font-weight: 700;

            color: #1f2937;
        }

        /* BUTTON MENU */

        .menu-toggle {

            display: flex;

            justify-content: center;

            align-items: center;

            width: 50px;

            height: 50px;

            border: none;

            border-radius: 15px;

            background: #1e3a8a;

            color: #fff;

            font-size: 20px;

            cursor: pointer;
        }

        /* TOPBAR */

        .topbar {

            flex-direction: column;

            text-align: center;

            gap: 15px;

            padding: 20px;
        }

        .topbar h3 {

            font-size: 28px;
        }

        .topbar p {

            font-size: 16px;
        }

        .user-info {

            text-align: center;
        }

        /* PROFILE */

        .profile-card {

            padding: 15px;
        }

        .profile-avatar {

            width: 70px;
            height: 70px;

            font-size: 35px;
        }

    }
    </style>


</head>

<body>

    {{-- OVERLAY MOBILE --}}
    <div class="overlay"></div>

    {{-- SIDEBAR --}}
    <div class="sidebar">

        <div class="profile-card">

            <div class="profile-avatar">
                C
            </div>

            <h4>Camat</h4>

            <p>Administrator</p>

        </div>

        <div class="menu-title">
            MENU UTAMA
        </div>

        <div class="sidebar-menu">

            <a href="{{ route('camat.dashboard') }}">
                <i class="fa fa-home"></i>
                Dashboard
            </a>

            <a href="{{ route('camat.monitoring') }}">
                <i class="fa fa-chart-line"></i>
                Monitoring
            </a>

            <a href="{{ route('camat.persetujuan') }}">
                <i class="fa fa-check-circle"></i>
                Persetujuan
            </a>

            <a href="{{ route('camat.laporan') }}">
                <i class="fa fa-file-alt"></i>
                Laporan
            </a>

            <a href="{{ route('camat.aktivitas') }}">
                <i class="fa fa-users"></i>
                Aktivitas Camat
            </a>

        </div>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">

            @csrf

            <button type="submit" class="logout-btn">

                <i class="fa fa-sign-out-alt"></i>

                Logout

            </button>

        </form>

    </div>

    {{-- CONTENT --}}
    <div class="content">

        <div class="mobile-header">

            <button id="menuToggle" class="menu-toggle">
                <i class="fa fa-bars"></i>
            </button>

            <span>Menu Camat</span>

        </div>

        {{-- TOPBAR --}}
        <div class="topbar">

            <div>

                <h3>
                    Sistem Pengaduan Masyarakat
                </h3>

                <p>
                    Kecamatan Parigi Tengah
                </p>

            </div>

            <div class="user-info">

                <h5>
                    {{ Auth::user()->name }}
                </h5>

                <small>
                    {{ date('d M Y') }}
                </small>

            </div>

        </div>

        {{-- PAGE CONTENT --}}
        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

    <script>
    document.addEventListener('DOMContentLoaded', function() {

        const menuToggle =
            document.getElementById('menuToggle');

        const sidebar =
            document.querySelector('.sidebar');

        const overlay =
            document.querySelector('.overlay');

        menuToggle.addEventListener('click', function() {

            sidebar.classList.toggle('show');

            overlay.classList.toggle('show');

        });

        overlay.addEventListener('click', function() {

            sidebar.classList.remove('show');

            overlay.classList.remove('show');

        });

    });
    </script>


</body>


</html>