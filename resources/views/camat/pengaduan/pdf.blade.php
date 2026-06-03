<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Laporan Pengaduan</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        h2{
            text-align: center;
            margin-bottom: 5px;
        }

        .tanggal{
            text-align: center;
            margin-bottom: 20px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td{
            border: 1px solid black;
        }

        th{
            background-color: #f2f2f2;
        }

        th, td{
            padding: 8px;
            text-align: left;
        }

        .status-pending{
            color: orange;
            font-weight: bold;
        }

        .status-diproses{
            color: blue;
            font-weight: bold;
        }

        .status-selesai{
            color: green;
            font-weight: bold;
        }

        .status-ditolak{
            color: red;
            font-weight: bold;
        }

        .footer{
            margin-top: 40px;
            text-align: right;
        }

    </style>

</head>

<body>

    <!-- JUDUL -->
    <h2>

        {{ $judul }}

    </h2>

    <!-- TANGGAL CETAK -->
    <div class="tanggal">

        Tanggal Cetak :
        {{ now()->format('d M Y') }}

    </div>

    <!-- TABLE -->
    <table>

        <thead>

            <tr>

                <th width="5%">No</th>

                <th width="20%">Pelapor</th>

                <th width="25%">Judul</th>

                <th width="30%">Isi Laporan</th>

                <th width="10%">Status</th>

                <th width="10%">Tanggal</th>

            </tr>

        </thead>

        <tbody>

            @forelse($pengaduan as $item)

            <tr>

                <!-- NO -->
                <td>

                    {{ $loop->iteration }}

                </td>

                <!-- PELAPOR -->
                <td>

                    {{ $item->user->name }}

                </td>

                <!-- JUDUL -->
                <td>

                    {{ $item->judul }}

                </td>

                <!-- ISI -->
                <td>

                    {{ $item->isi_laporan }}

                </td>

                <!-- STATUS -->
                <td>

                    @if($item->status == 'pending')

                        <span class="status-pending">

                            Pending

                        </span>

                    @elseif($item->status == 'diproses')

                        <span class="status-diproses">

                            Diproses

                        </span>

                    @elseif($item->status == 'selesai')

                        <span class="status-selesai">

                            Selesai

                        </span>

                    @else

                        <span class="status-ditolak">

                            Ditolak

                        </span>

                    @endif

                </td>

                <!-- TANGGAL -->
                <td>

                    {{ $item->created_at->format('d M Y') }}

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6"
                    style="text-align:center;">

                    Tidak ada data pengaduan

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    <!-- FOOTER -->
    <div class="footer">

        <p>

            Camat

        </p>

        <br><br><br>

        <p>

            _______________________

        </p>

    </div>

</body>

</html>