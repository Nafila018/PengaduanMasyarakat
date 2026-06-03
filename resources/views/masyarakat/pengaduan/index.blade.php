@extends('layouts.masyarakat')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold text-primary mb-1">

                Data Pengaduan

            </h3>

            <small class="text-muted">

                Daftar pengaduan masyarakat

            </small>

        </div>


    </div>


    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success rounded-4 border-0 shadow-sm">

            {{ session('success') }}

        </div>

    @endif


    {{-- TABLE --}}
    <div class="card border-0 shadow-lg rounded-5 overflow-hidden">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead class="table-primary">

                        <tr>

                            <th class="p-4">No</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th class="text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pengaduans as $item)

                        <tr>

                            <td class="p-4">

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <strong>

                                    {{ $item->judul }}

                                </strong>

                            </td>

                            <td>

                                <span class="badge
                                    @if($item->status == 'pending')
                                        bg-warning
                                    @elseif($item->status == 'diproses')
                                        bg-info
                                    @elseif($item->status == 'selesai')
                                        bg-success
                                    @elseif($item->status == 'ditolak')
                                        bg-danger
                                    @endif
                                ">

                                    {{ ucfirst($item->status) }}

                                </span>

                            </td>

                            <td>

                                @if($item->foto)

                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                         width="80"
                                         height="80"
                                         class="rounded-4 shadow-sm"
                                         style="object-fit:cover;">

                                @else

                                    <span class="text-muted">
                                        Tidak ada foto
                                    </span>

                                @endif

                            </td>

                           <td class="text-center">

    <div class="d-flex justify-content-center gap-2 flex-wrap">

        {{-- DETAIL --}}
        <a href="{{ route('masyarakat.pengaduan.show', $item->id) }}"
           class="btn btn-info btn-sm rounded-3">

            <i class="bi bi-eye-fill"></i>

            Detail

        </a>


        {{-- EDIT --}}
        <a href="{{ route('masyarakat.pengaduan.edit', $item->id) }}"
           class="btn btn-warning btn-sm rounded-3">

            <i class="bi bi-pencil-square"></i>

            Edit

        </a>


        {{-- BATALKAN --}}
        <form action="{{ route('masyarakat.pengaduan.destroy', $item->id) }}"
              method="POST"
              onsubmit="return confirm('Yakin ingin membatalkan pengaduan ini?')">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-danger btn-sm rounded-3">

                <i class="bi bi-x-circle-fill"></i>

                Batal

            </button>

        </form>

    </div>

</td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-5 text-muted">

                                Belum ada pengaduan

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
