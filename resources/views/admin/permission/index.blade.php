@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">

                Data Permission

            </h2>

            <small class="text-muted">

                Kelola hak akses pengguna sistem

            </small>

        </div>

        <!-- BUTTON TAMBAH -->
        <a href="/admin/permission/create"
           class="btn btn-primary rounded-pill px-4 shadow-sm">

            <i class="bi bi-plus-circle-fill"></i>

            Tambah Permission

        </a>

    </div>

    <!-- ALERT -->
    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm rounded-4">

            <i class="bi bi-check-circle-fill"></i>

            {{ session('success') }}

        </div>

    @endif

    <!-- CARD -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <!-- TABLE -->
        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead style="
                       background:#2563eb;
                       color:white;
                       ">

                    <tr>

                        <th width="80"
                            class="text-center">

                            No

                        </th>

                        <th>

                            Nama Permission

                        </th>

                        <th width="180"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($permission as $item)

                    <tr>

                        <!-- NO -->
                        <td class="text-center fw-semibold">

                            {{ $loop->iteration }}

                        </td>

                        <!-- NAMA -->
                        <td>

                            <div class="fw-semibold text-dark">

                                {{ $item->nama_permission }}

                            </div>

                        </td>

                        <!-- AKSI -->
                        <td>

                            <div class="d-flex justify-content-center gap-2">

                                <!-- EDIT -->
                                <a href="/admin/permission/{{ $item->id }}/edit"
                                   class="btn btn-warning btn-sm rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                   style="
                                   width:38px;
                                   height:38px;
                                   ">

                                    <i class="bi bi-pencil-fill text-white"></i>

                                </a>

                                <!-- HAPUS -->
                                <form action="/admin/permission/{{ $item->id }}"
                                      method="POST"
                                      onsubmit="return confirm(
                                      'Yakin hapus permission?'
                                      )">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                            style="
                                            width:38px;
                                            height:38px;
                                            border:none;
                                            ">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3"
                            class="text-center text-muted py-5">

                            <i class="bi bi-database-x"
                               style="font-size:40px;"></i>

                            <br><br>

                            Belum ada data permission

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

