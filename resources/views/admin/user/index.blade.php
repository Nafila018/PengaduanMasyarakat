@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <!-- TITLE -->
        <div>

            <h2 class="fw-bold mb-1">

                Data User

            </h2>

            <small class="text-muted">

                Kelola seluruh pengguna sistem

            </small>

        </div>

        <!-- BUTTON -->
        <a href="/admin/user/create"
           class="btn btn-primary rounded-pill px-4 shadow-sm">

            <i class="bi bi-plus-circle-fill"></i>

            Tambah User

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
    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body p-4">

            <!-- SEARCH -->
            <div class="d-flex justify-content-end mb-4">

                <form method="GET"
                      style="width:300px;">

                    <div class="input-group">

                        <span class="input-group-text bg-white border-end-0 rounded-start-pill">

                            <i class="bi bi-search"></i>

                        </span>

                        <input type="text"
                               name="search"
                               class="form-control border-start-0 rounded-end-pill"
                               placeholder="Cari user..."
                               value="{{ request('search') }}">

                    </div>

                </form>

            </div>

            <!-- TABLE -->
            <div class="table-responsive">

                <table class="table align-middle">

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

                                Nama

                            </th>

                            <th>

                                Email

                            </th>

                            <th>

                                Role

                            </th>

                            <th width="180"
                                class="text-center">

                                Aksi

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $item)

                        <tr>

                            <!-- NO -->
                            <td class="text-center fw-semibold">

                                {{ $loop->iteration }}

                            </td>

                            <!-- NAMA -->
                            <td>

                                <div class="fw-semibold">

                                    {{ $item->name }}

                                </div>

                            </td>

                            <!-- EMAIL -->
                            <td>

                                {{ $item->email }}

                            </td>

                            <!-- ROLE -->
                            <td>

                                <span class="
                                badge
                                rounded-pill
                                px-3
                                py-2

                                @if($item->role == 'admin')
                                    bg-danger
                                @elseif($item->role == 'camat')
                                    bg-warning text-dark
                                @else
                                    bg-primary
                                @endif
                                ">

                                    {{ ucfirst($item->role) }}

                                </span>

                            </td>

                            <!-- AKSI -->
                            <td>

                                <div class="d-flex justify-content-center gap-2">

                                    <!-- EDIT -->
                                    <a href="/admin/user/{{ $item->id }}/edit"
                                       class="btn btn-warning btn-sm rounded-circle shadow-sm d-flex align-items-center justify-content-center"
                                       style="
                                       width:38px;
                                       height:38px;
                                       ">

                                        <i class="bi bi-pencil-fill text-white"></i>

                                    </a>

                                    <!-- HAPUS -->
                                    <form action="/admin/user/{{ $item->id }}"
                                          method="POST"
                                          onsubmit="return confirm(
                                          'Yakin hapus user?'
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

                            <td colspan="5"
                                class="text-center text-muted py-5">

                                <i class="bi bi-people-fill"
                                   style="font-size:40px;"></i>

                                <br><br>

                                Belum ada data user

                            </td>

                        </tr >

                        @endforelse

                    </tbody>

                </table>

            </div>


        </div>

    </div>

</div>

@endsection

