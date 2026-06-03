@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">

                Data Role

            </h2>

            <small class="text-muted">

                Kelola role dan permission pengguna sistem

            </small>

        </div>

        <!-- BUTTON -->
        <a href="/admin/role/create"
           class="btn btn-primary rounded-pill px-4 shadow-sm">

            <i class="bi bi-plus-circle-fill"></i>

            Tambah Role

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

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <!-- HEAD -->
                <thead style="
                       background:#2563eb;
                       color:white;
                       ">

                    <tr>

                        <th width="80"
                            class="text-center">

                            No

                        </th>

                        <th width="220">

                            Nama Role

                        </th>

                        <th>

                            Permission

                        </th>

                        <th width="180"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    @forelse($role as $item)

                    <tr>

                        <!-- NO -->
                        <td class="text-center fw-semibold">

                            {{ $loop->iteration }}

                        </td>

                        <!-- ROLE -->
                        <td>

                            <div class="fw-bold text-dark">

                                {{ ucfirst($item->nama_role) }}

                            </div>

                        </td>

                        <!-- PERMISSION -->
                        <td>

                            @if($item->permissionS->count() > 0)

                                <div class="d-flex flex-wrap gap-2">

                                    @foreach($item->permissions as $permission)

                                        <span class="badge rounded-pill bg-primary px-3 py-2">

                                            <i class="bi bi-shield-lock-fill"></i>

                                            {{ $permission->nama_permission }}

                                        </span>

                                    @endforeach

                                </div>

                            @else

                                <span class="text-muted">

                                    Tidak ada permission

                                </span>

                            @endif

                        </td>

                        <!-- AKSI -->
                        <td>

                            <div class="d-flex justify-content-center gap-2">

                                <!-- EDIT -->
                                <a href="/admin/role/{{ $item->id }}/edit"
                                   class="btn btn-warning btn-sm rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                   style="
                                   width:40px;
                                   height:40px;
                                   ">

                                    <i class="bi bi-pencil-fill text-white"></i>

                                </a>

                                <!-- HAPUS -->
                                <form action="/admin/role/{{ $item->id }}"
                                      method="POST"
                                      onsubmit="return confirm(
                                      'Yakin ingin menghapus role ini?'
                                      )">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                            style="
                                            width:40px;
                                            height:40px;
                                            border:none;
                                            ">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <!-- EMPTY -->
                    <tr>

                        <td colspan="4"
                            class="text-center text-muted py-5">

                            <i class="bi bi-person-x-fill"
                               style="font-size:50px;"></i>

                            <br><br>

                            Belum ada data role

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

