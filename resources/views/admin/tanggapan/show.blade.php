@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-5 overflow-hidden">

                {{-- HEADER --}}
                <div class="bg-primary text-white p-4">

                    <h3 class="fw-bold mb-1">

                        <i class="bi bi-chat-dots-fill me-2"></i>

                        Beri Tanggapan

                    </h3>

                    <small>
                        Kelola tanggapan pengaduan masyarakat
                    </small>

                </div>


                {{-- BODY --}}
                <div class="card-body p-5">

                    {{-- SUCCESS --}}
                    @if(session('success'))

                        <div class="alert alert-success rounded-4">

                            {{ session('success') }}

                        </div>

                    @endif


                    {{-- ERROR --}}
                    @if($errors->any())

                        <div class="alert alert-danger rounded-4">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- DATA PENGADUAN --}}
                    <div class="mb-4">

                        <label class="fw-bold text-muted">

                            Judul Pengaduan

                        </label>

                        <div class="form-control rounded-4 p-3">

                            {{ $pengaduan->judul }}

                        </div>

                    </div>


                    <div class="mb-4">

                        <label class="fw-bold text-muted">

                            Isi Laporan

                        </label>

                        <div class="form-control rounded-4 p-3"
                             style="min-height:120px;">

                            {{ $pengaduan->isi_laporan }}

                        </div>

                    </div>


                    {{-- FOTO --}}
                    @if($pengaduan->foto)

                        <div class="mb-4">

                            <label class="fw-bold text-muted d-block">

                                Foto Bukti

                            </label>

                            <img src="{{ asset('storage/' . $pengaduan->foto) }}"
                                 class="img-fluid rounded-4 shadow"
                                 style="max-height:300px; object-fit:cover;">

                        </div>

                    @endif


                    {{-- FORM --}}
                    <form action="{{ route('tanggapan.store', $pengaduan->id) }}"
                          method="POST">

                        @csrf

                        <div class="mb-4">

                            <label class="fw-bold text-muted">

                                Tulis Tanggapan

                            </label>

                            <textarea name="tanggapan"
                                      rows="5"
                                      class="form-control rounded-4"
                                      required></textarea>

                        </div>


                        {{-- BUTTON --}}
                        <div class="d-flex gap-3 flex-wrap">

                            <button type="submit"
                                    class="btn btn-primary px-4 py-2 rounded-4">

                                <i class="bi bi-send-fill me-2"></i>

                                Kirim Tanggapan

                            </button>


                            <a href="{{ route('pengaduan.index') }}"
                               class="btn btn-secondary px-4 py-2 rounded-4">

                                Kembali

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection