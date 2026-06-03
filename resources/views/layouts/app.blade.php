
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>

        Sistem Pengaduan Masyarakat

    </title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

        body{
            background:#f4f7fb;
            font-family:'Segoe UI',sans-serif;
        }

        /* SIDEBAR */
        .sidebar{
            width:270px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:
            linear-gradient(
            180deg,
            #1e3a8a,
            #2563eb
            );
            color:white;
            padding:25px 18px;
            overflow-y:auto;
            z-index:1000;
        }

        /* LOGO */
        .logo{
            text-align:center;
            margin-bottom:35px;
        }

        .logo i{
            font-size:55px;
        }

        .logo h4{
            font-weight:bold;
            margin-top:10px;
            margin-bottom:5px;
        }

        .logo small{
            opacity:0.8;
            font-size:13px;
        }

        /* PROFILE */
        .profile-box{
            background:rgba(255,255,255,0.15);
            border-radius:20px;
            padding:20px;
            text-align:center;
            margin-bottom:30px;
        }

        .profile-box .avatar{
            width:80px;
            height:80px;
            border-radius:50%;
            background:white;
            color:#2563eb;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:30px;
            font-weight:bold;
            margin:auto;
            margin-bottom:12px;
        }

        /* MENU */
        .menu-title{
            font-size:13px;
            opacity:0.7;
            margin-bottom:10px;
            margin-top:20px;
        }

        .sidebar a{
            display:flex;
            align-items:center;
            gap:12px;
            text-decoration:none;
            color:white;
            padding:14px 16px;
            border-radius:16px;
            margin-bottom:10px;
            transition:0.3s;
            font-weight:500;
        }

        .sidebar a:hover{
            background:rgba(255,255,255,0.2);
            transform:translateX(4px);
        }

        .sidebar a.active{
            background:white;
            color:#2563eb;
            font-weight:bold;
        }

        /* CONTENT */
        .main-content{
            margin-left:270px;
            padding:25px;
        }

        /* NAVBAR */
        .top-navbar{
            background:white;
            border-radius:22px;
            padding:18px 25px;
            margin-bottom:30px;
            box-shadow:0 5px 20px rgba(0,0,0,0.05);
        }

        .top-navbar h5{
            margin:0;
            font-weight:bold;
        }

        /* LOGOUT */
        .logout-btn{
            width:100%;
            border:none;
            background:#ef4444;
            color:white;
            padding:14px;
            border-radius:16px;
            margin-top:25px;
            transition:0.3s;
            font-weight:600;
        }

        .logout-btn:hover{
            background:#dc2626;
        }

    </style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <!-- LOGO -->
    <div class="logo">

        <i class="bi bi-megaphone-fill"></i>

        <h4>

            SIPM

        </h4>

        <small>

            Sistem Pengaduan Masyarakat

        </small>

    </div>

    <!-- PROFILE -->
    <div class="profile-box">

        <div class="avatar">

            {{ strtoupper(substr(Auth::user()->name,0,1)) }}

        </div>

        <h6 class="fw-bold mb-1">

            {{ Auth::user()->name }}

        </h6>

        <small>

            {{ ucfirst(Auth::user()->role) }}

        </small>

    </div>

    <!-- MENU -->
    <div class="menu-title">

        MENU UTAMA

    </div>

    <!-- DASHBOARD -->
    <a href="{{ route('admin.dashboard') }}"
   class="nav-link">

    <i class="bi bi-grid-fill"></i>

    <span>Dashboard</span>

</a>

    <!-- KELOLA PENGADUAN -->
    <a href="/admin/pengaduan"
       class="{{ request()->is('admin/pengaduan*') ? 'active' : '' }}">

        <i class="bi bi-file-earmark-text-fill"></i>

        Kelola Pengaduan

    </a>

<!-- TANGGAPAN -->
<a href="/admin/tanggapan"
   class="{{ request()->is('admin/tanggapan*') ? 'active' : '' }}">

    <i class="bi bi-chat-dots-fill"></i>

    Tanggapan

</a>

<!-- USER -->
<a href="/admin/user"
   class="{{ request()->is('admin/user*') ? 'active' : '' }}">

    <i class="bi bi-people-fill"></i>

    Data User

</a>

<!-- ROLE -->
<a href="/admin/role"
   class="{{ request()->is('admin/role*') ? 'active' : '' }}">

    <i class="bi bi-person-badge-fill"></i>

    Role

</a>

<!-- PERMISSION -->
<a href="/admin/permission"
   class="{{ request()->is('admin/permission*') ? 'active' : '' }}">

    <i class="bi bi-shield-lock-fill"></i>

    Permission

</a>
    <!-- LOGOUT -->
    <form action="/logout"
          method="POST">

        @csrf

        <button type="submit"
                class="logout-btn">

            <i class="bi bi-box-arrow-right"></i>

            Logout

        </button>

    </form>

</div>

<!-- MAIN CONTENT -->
<div class="main-content">

    <!-- NAVBAR -->
    <div class="top-navbar">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5>

                    Sistem Pengaduan Masyarakat

                </h5>

                <small class="text-muted">

                    Kecamatan Parigi Tengah

                </small>

            </div>

            <div class="text-end">

                <div class="fw-semibold">

                    {{ Auth::user()->name }}

                </div>

                <small class="text-muted">

                    {{ now()->format('d F Y') }}

                </small>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    @yield('content')

</div>

</body>

</html>
