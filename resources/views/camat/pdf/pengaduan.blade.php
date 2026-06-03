<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>
        Laporan Pengaduan
    </title>

    <style>

        body{
            font-family: sans-serif;
            padding: 30px;
        }

        .title{
            text-align:center;
            margin-bottom:40px;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        td{
            padding:10px;
            vertical-align: top;
        }

        .label{
            width:200px;
            font-weight:bold;
        }

        .box{
            border:1px solid #ccc;
            padding:15px;
            border-radius:10px;
            margin-top:10px;
        }

    </style>

</head>

<body>

    <div class="title">

        <h2>
            LAPORAN PENGADUAN MASYARAKAT
        </h2>

    </div>

    <table>

        <tr>

            <td class="label">
                Nama
            </td>

            <td>
                : {{ $pengaduan->user->name ?? '-' }}
            </td>

        </tr>

        <tr>

            <td class="label">
                Alamat
            </td>

            <td>
                : {{ $pengaduan->user->alamat ?? '-' }}
            </td>

        </tr>

        <tr>

            <td class="label">
                Email
            </td>

            <td>
                : {{ $pengaduan->user->email ?? '-' }}
            </td>

        </tr>

        <tr>

            <td class="label">
                Judul Pengaduan
            </td>

            <td>
                : {{ $pengaduan->judul }}
            </td>

        </tr>

        <tr>

            <td class="label">
                Status
            </td>

            <td>
                : {{ ucfirst($pengaduan->status) }}
            </td>

        </tr>

        <tr>

            <td class="label">
                Tanggal
            </td>

            <td>
                : {{ $pengaduan->created_at->format('d M Y') }}
            </td>

        </tr>

    </table>

    <div class="box">

        <strong>
            Isi Pengaduan:
        </strong>

        <br><br>

        {{ $pengaduan->isi_laporan }}

    </div>

</body>
</html>