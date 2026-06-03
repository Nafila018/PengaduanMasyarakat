@extends('layouts.app')

@section('title', 'Tambah Role')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                Tambah Role

            </h3>

            <p class="text-muted mb-0">

                Tambahkan role dan atur permission pengguna sistem.

            </p>

        </div>

        <a href="/admin/role"
           class="btn btn-secondary rounded-3 px-4">

            <i class="fa fa-arrow-left me-1"></i>

            Kembali

        </a>

    </div>

    {{-- CARD --}}
    <div class="card border-0 shadow-sm rounded-4">

        {{-- HEADER --}}
        <div class="card-header bg-primary text-white border-0 rounded-top-4 py-3">

            <h5 class="mb-0 fw-semibold">

                <i class="fa fa-user-shield me-2"></i>

                Form Tambah Role

            </h5>

        </div>

        {{-- BODY --}}
        <div class="card-body p-4">

            {{-- ERROR --}}
            @if ($errors->any())

                <div class="alert alert-danger rounded-4">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            {{-- FORM --}}
            <form action="/admin/role"
                  method="POST">

                @csrf

                {{-- NAMA ROLE --}}
                <div class="mb-5">

                    <label class="form-label fw-semibold">

                        Nama Role

                    </label>

                    <input type="text"
                           name="nama_role"
                           class="form-control form-control-lg rounded-3"
                           placeholder="Contoh : Admin, Camat, Masyarakat"
                           value="{{ old('nama_role') }}"
                           required>

                    <small class="text-muted">

                        Role digunakan untuk membedakan hak akses pengguna.

                    </small>

                </div>

                {{-- TITLE --}}
                <div class="mb-4">

                    <h4 class="fw-bold mb-4">

                        <i class="fa fa-shield-alt text-primary"></i>

                        Pilih Permission

                    </h4>

                    <div class="row g-4">

                        {{-- ADMIN --}}
                        <div class="col-md-4">

                            <div class="card border-0 shadow rounded-4 h-100">

                                <div class="card-header bg-primary text-white rounded-top-4">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <span class="fw-bold">

                                            <i class="fa fa-user-shield"></i>

                                            Admin

                                        </span>

                                        <div class="form-check">

                                            <input type="checkbox"
                                                   class="form-check-input check-admin">

                                        </div>

                                    </div>

                                </div>

                                <div class="card-body">

                                    @foreach($permission->whereIn('nama_permission', [

                                        'user.view',
                                        'user.create',
                                        'user.update',
                                        'user.delete',

                                        'role.view',
                                        'role.create',
                                        'role.update',
                                        'role.delete',

                                        'permission.view',
                                        'permission.create',
                                        'permission.update',
                                        'permission.delete'

                                    ]) as $item)

                                        <div class="form-check mb-3">

                                            <input class="form-check-input admin-item"
                                                   type="checkbox"
                                                   name="permission[]"
                                                   value="{{ $item->id }}"

                                                   {{ in_array($item->id, old('permission', []))
                                                   ? 'checked'
                                                   : '' }}>

                                            <label class="form-check-label">

                                                {{ $item->nama_permission }}

                                            </label>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        </div>

                        {{-- CAMAT --}}
                        <div class="col-md-4">

                            <div class="card border-0 shadow rounded-4 h-100">

                                <div class="card-header bg-success text-white rounded-top-4">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <span class="fw-bold">

                                            <i class="fa fa-building"></i>

                                            Camat

                                        </span>

                                        <div class="form-check">

                                            <input type="checkbox"
                                                   class="form-check-input check-camat">

                                        </div>

                                    </div>

                                </div>

                                <div class="card-body">

                                    @foreach($permission->whereIn('nama_permission', [

                                        'pengaduan.view',
                                        'pengaduan.export',
                                        'pengaduan.approval',

                                        'tanggapan.view',
                                        'tanggapan.create',
                                        'tanggapan.update',
                                        'tanggapan.delete'

                                    ]) as $item)

                                        <div class="form-check mb-3">

                                            <input class="form-check-input camat-item"
                                                   type="checkbox"
                                                   name="permission[]"
                                                   value="{{ $item->id }}"

                                                   {{ in_array($item->id, old('permission', []))
                                                   ? 'checked'
                                                   : '' }}>

                                            <label class="form-check-label">

                                                {{ $item->nama_permission }}

                                            </label>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        </div>

                        {{-- MASYARAKAT --}}
                        <div class="col-md-4">

                            <div class="card border-0 shadow rounded-4 h-100">

                                <div class="card-header bg-warning rounded-top-4">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <span class="fw-bold">

                                            <i class="fa fa-users"></i>

                                            Masyarakat

                                        </span>

                                        <div class="form-check">

                                            <input type="checkbox"
                                                   class="form-check-input check-masyarakat">

                                        </div>

                                    </div>

                                </div>

                                <div class="card-body">

                                    @foreach($permission->whereIn('nama_permission', [

                                        'pengaduan.view',
                                        'pengaduan.create',
                                        'pengaduan.update',
                                        'pengaduan.delete'

                                    ]) as $item)

                                        <div class="form-check mb-3">

                                            <input class="form-check-input masyarakat-item"
                                                   type="checkbox"
                                                   name="permission[]"
                                                   value="{{ $item->id }}"

                                                   {{ in_array($item->id, old('permission', []))
                                                   ? 'checked'
                                                   : '' }}>

                                            <label class="form-check-label">

                                                {{ $item->nama_permission }}

                                            </label>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="d-flex gap-2 mt-5">

                    <button type="submit"
                            class="btn btn-primary rounded-3 px-4">

                        <i class="fa fa-save me-1"></i>

                        Simpan Role

                    </button>

                    <a href="/admin/role"
                       class="btn btn-light border rounded-3 px-4">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

{{-- SCRIPT --}}
<script>

    // ADMIN
    document.querySelector('.check-admin')
    ?.addEventListener('change', function(){

        document.querySelectorAll('.admin-item')
        .forEach(item => {

            item.checked = this.checked;

        });

    });

    // CAMAT
    document.querySelector('.check-camat')
    ?.addEventListener('change', function(){

        document.querySelectorAll('.camat-item')
        .forEach(item => {

            item.checked = this.checked;

        });

    });

    // MASYARAKAT
    document.querySelector('.check-masyarakat')
    ?.addEventListener('change', function(){

        document.querySelectorAll('.masyarakat-item')
        .forEach(item => {

            item.checked = this.checked;

        });

    });

</script>

@endsection

