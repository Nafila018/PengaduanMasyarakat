@extends('layouts.masyarakat')

@section('content')

<div class="container">

    <!-- HEADER -->
    <div class="card border-0 shadow-lg mb-4 overflow-hidden">

        <div class="card-body p-5"
             style="
             background: linear-gradient(
             135deg,
             #1c6e94,
             #128cc5b1
             );
             color:white;
             ">

            <div class="row align-items-center">

                <!-- TEXT -->
                <div class="col-md-8">

                    <h1 class="fw-bold">

                        Profile Saya

                    </h1>

                    <p class="fs-5">

                        Kelola informasi akun dan foto profile Anda.

                    </p>

                </div>

                <!-- ICON -->
                <div class="col-md-4 text-center">

                    <div style="font-size:100px;">

                        👤

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ALERT SUCCESS -->
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    <!-- VALIDATION -->
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <!-- PROFILE -->
    <div class="card border-0 shadow-sm">

        <div class="card-body p-5">

        
<form action="{{ route('masyarakat.profile.update') }}"
      method="POST">

    @csrf
    @method('PUT')

                <div class="row">

                    <!-- FORM -->
                    <div class="col-md-8">

                        <!-- NAMA -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                Nama Lengkap

                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg"
                                   value="{{ Auth::user()->name }}"
                                   required>

                        </div>

                        <!-- EMAIL -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                Email

                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control form-control-lg"
                                   value="{{ Auth::user()->email }}"
                                   required>

                        </div>

                        <!-- ALAMAT -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                Alamat

                            </label>

                            <textarea name="alamat"
                                      rows="4"
                                      class="form-control">{{ Auth::user()->alamat }}</textarea>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex gap-2">

                            <button type="submit"
                                    class="btn btn-primary btn-lg shadow">

                                💾 Simpan Perubahan

                            </button>

                            <a href="/masyarakat/dashboard"
                               class="btn btn-secondary btn-lg shadow">

                                Kembali

                            </a>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- PREVIEW IMAGE -->
<script>

function previewImage(event)
{
    const image = document.getElementById(
                    'preview'
                  );

    image.src = URL.createObjectURL(
                    event.target.files[0]
                );
}

</script>

@endsection

