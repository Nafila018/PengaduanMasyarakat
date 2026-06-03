@extends('layouts.masyarakat')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-5 overflow-hidden">

                {{-- HEADER --}}
                <div class="bg-primary text-white p-4">

                    <h3 class="fw-bold mb-1">

                        <i class="bi bi-plus-circle-fill me-2"></i>

                        Tambah Pengaduan

                    </h3>

                    <small>
                        Silakan isi laporan pengaduan dengan lengkap
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


                    {{-- FORM --}}
                    <form action="{{ route('masyarakat.pengaduan.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf


                        {{-- JUDUL --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Judul Pengaduan

                            </label>

                            <input type="text"
                                   name="judul"
                                   class="form-control form-control-lg rounded-4"
                                   value="{{ old('judul') }}"
                                   required>

                        </div>


                        {{-- DESKRIPSI --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Isi Pengaduan

                            </label>

                            <textarea name="deskripsi"
                                      rows="6"
                                      class="form-control rounded-4"
                                      required>{{ old('deskripsi') }}</textarea>

                        </div>


                        {{-- FOTO --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Upload Bukti Foto

                            </label>

                            <input type="file"
                                   name="foto"
                                   class="form-control rounded-4">

                        </div>


                        {{-- BUTTON --}}
                        <div class="d-flex gap-3 flex-wrap">

                            <button type="submit"
                                    class="btn btn-primary px-4 py-2 rounded-4">

                                <i class="bi bi-send-fill me-2"></i>

                                Kirim Pengaduan

                            </button>


                            <a href="{{ route('masyarakat.pengaduan.index') }}"
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