@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="mb-4">

        <h3 class="fw-bold">
            Edit User
        </h3>

        <p class="text-muted">
            Ubah data user dan role pengguna sistem.
        </p>

    </div>

    {{-- CARD --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="/admin/user/{{ $user->id }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- NAMA --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Nama Lengkap
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ $user->name }}"
                               class="form-control rounded-3"
                               placeholder="Masukkan nama">

                    </div>

                    {{-- EMAIL --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ $user->email }}"
                               class="form-control rounded-3"
                               placeholder="Masukkan email">

                    </div>

                    {{-- PASSWORD --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Password Baru
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control rounded-3"
                               placeholder="Kosongkan jika tidak diubah">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengubah password
                        </small>

                    </div>

                    {{-- ROLE --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Role
                        </label>

                        <select name="role"
                                class="form-select rounded-3">

                            <option value="admin"
                                {{ $user->role == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="camat"
                                {{ $user->role == 'camat' ? 'selected' : '' }}>
                                Camat
                            </option>

                            <option value="masyarakat"
                                {{ $user->role == 'masyarakat' ? 'selected' : '' }}>
                                Masyarakat
                            </option>

                        </select>

                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="mt-4 d-flex gap-2">

                    <button type="submit"
                            class="btn btn-primary rounded-3 px-4">

                        <i class="fa fa-save me-1"></i>
                        Update User

                    </button>

                    <a href="/admin/user"
                       class="btn btn-secondary rounded-3 px-4">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

