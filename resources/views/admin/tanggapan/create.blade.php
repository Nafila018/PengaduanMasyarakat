@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="mb-4">

        <h2 class="fw-bold">

            Verifikasi & Tanggapan Pengaduan

        </h2>

        <small class="text-muted">

            Admin dapat memverifikasi dan memberi tanggapan kepada masyarakat

        </small>

    </div>

    <!-- CARD -->
    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body p-4">

            <form action="/admin/tanggapan"
                  method="POST">

                @csrf

                <!-- ID PENGADUAN -->
                <input type="hidden"
                       name="pengaduan_id"
                       value="{{ $pengaduan->id }}">

                <!-- NAMA -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Nama Pelapor

                    </label>

                    <input type="text"
                           class="form-control"
                           value="{{ $pengaduan->user->name }}"
                           readonly>

                </div>

                <!-- ALAMAT -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Alamat

                    </label>

                    <input type="text"
                           class="form-control"
                           value="{{ $pengaduan->user->alamat }}"
                           readonly>

                </div>

                <!-- JUDUL -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Judul Pengaduan

                    </label>

                    <input type="text"
                           class="form-control"
                           value="{{ $pengaduan->judul }}"
                           readonly>

                </div>

                <!-- ISI LAPORAN -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Isi Laporan

                    </label>

                    <textarea class="form-control"
                              rows="4"
                              readonly>{{ $pengaduan->isi_laporan }}</textarea>

                </div>

                <!-- FOTO BUKTI -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Bukti Pengaduan

                    </label>

                    <br>

                    @if($pengaduan->foto)

                        <img src="{{ asset('storage/' . $pengaduan->foto) }}"
                             class="img-fluid rounded-4 shadow"
                             width="300">

                    @else

                        <p class="text-muted">

                            Tidak ada foto

                        </p>

                    @endif

                </div>

                <!-- STATUS -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Status Pengaduan

                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="pending">

                            Pending

                        </option>

                        <option value="diproses">

                            Diproses

                        </option>

                        <option value="selesai">

                            Selesai

                        </option>

                        <option value="ditolak">

                            Ditolak

                        </option>

                    </select>

                </div>

                <!-- TANGGAPAN -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Tanggapan Admin

                    </label>

                    <textarea name="tanggapan"
                              class="form-control"
                              rows="5"
                              placeholder="Masukkan tanggapan admin..."
                              required></textarea>

                </div>

                <!-- BUTTON -->
                <div class="d-flex gap-2">

                    <button type="submit"
                            class="btn btn-primary rounded-pill px-4">

                        Kirim Tanggapan

                    </button>

                    <a href="/admin/pengaduan"
                       class="btn btn-secondary rounded-pill px-4">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection