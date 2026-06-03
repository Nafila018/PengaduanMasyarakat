@extends('layouts.masyarakat')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold text-primary">

            Progress Pengaduan

        </h2>

        <p class="text-muted">

            Pantau status dan perkembangan pengaduan Anda.

        </p>

    </div>


    {{-- LIST PENGADUAN --}}
    @forelse($pengaduans as $item)

        <div class="card border-0 shadow-lg rounded-4 mb-4 overflow-hidden">

            <div class="card-body p-4">

                {{-- HEADER --}}
                <div class="d-flex justify-content-between align-items-start mb-4">

                    <div>

                        <h4 class="fw-bold">

                            {{ $item->judul }}

                        </h4>

                        <small class="text-muted">

                            {{ $item->created_at->format('d M Y') }}

                        </small>

                    </div>

                    <div>

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

                    </div>

                </div>


                {{-- FOTO --}}
                @if($item->foto)

                    <div class="mb-4">

                        <img src="{{ asset('storage/' . $item->foto) }}"
                             class="img-fluid rounded-4 shadow-sm"
                             style="max-height:300px; object-fit:cover;">

                    </div>

                @endif


                {{-- ISI --}}
                <div class="mb-4">

                    <h6 class="fw-bold">
                        Isi Pengaduan
                    </h6>

                    <p class="text-muted">

                        {{ $item->isi }}

                    </p>

                </div>


                {{-- TIMELINE --}}
                <div class="timeline-wrapper mb-4">

                    {{-- PENDING --}}
                    <div class="timeline-step">

                        <div class="timeline-icon bg-warning text-white">

                            <i class="bi bi-check-lg"></i>

                        </div>

                        <p class="small fw-semibold mt-2">
                            Pending
                        </p>

                    </div>


                    {{-- GARIS --}}
                    <div class="timeline-line
                        @if(
                            $item->status == 'diproses' ||
                            $item->status == 'selesai'
                        )
                            active
                        @endif
                    "></div>


                    {{-- DIPROSES --}}
                    <div class="timeline-step">

                        <div class="timeline-icon
                            @if(
                                $item->status == 'diproses' ||
                                $item->status == 'selesai'
                            )
                                bg-info text-white
                            @else
                                bg-light
                            @endif
                        ">

                            <i class="bi bi-gear-fill"></i>

                        </div>

                        <p class="small fw-semibold mt-2">
                            Diproses
                        </p>

                    </div>


                    {{-- GARIS --}}
                    <div class="timeline-line
                        @if($item->status == 'selesai')
                            active-success
                        @endif
                    "></div>


                    {{-- SELESAI / DITOLAK --}}
                    <div class="timeline-step">

                        @if($item->status == 'ditolak')

                            <div class="timeline-icon bg-danger text-white">

                                <i class="bi bi-x-lg"></i>

                            </div>

                            <p class="small fw-semibold mt-2">
                                Ditolak
                            </p>

                        @else

                            <div class="timeline-icon
                                @if($item->status == 'selesai')
                                    bg-success text-white
                                @else
                                    bg-light
                                @endif
                            ">

                                <i class="bi bi-check-circle-fill"></i>

                            </div>

                            <p class="small fw-semibold mt-2">
                                Selesai
                            </p>

                        @endif

                    </div>

                </div>


                {{-- TANGGAPAN --}}
                @if($item->tanggapan)

                    <div class="alert alert-light border rounded-4">

                        <h6 class="fw-bold text-primary">

                            <i class="bi bi-chat-dots-fill me-2"></i>

                            Tanggapan Admin

                        </h6>

                        <p class="mb-0 text-muted">

                           {{ $item->tanggapan->first()->tanggapan ?? 'Belum ada tanggapan' }}

                        </p>

                    </div>

                @endif

            </div>

        </div>

    @empty

        <div class="card border-0 shadow rounded-4">

            <div class="card-body text-center py-5">

                <i class="bi bi-inbox-fill text-secondary"
                   style="font-size:70px;"></i>

                <h5 class="mt-4">

                    Belum ada pengaduan

                </h5>

                <p class="text-muted">

                    Silakan buat pengaduan terlebih dahulu.

                </p>

            </div>

        </div>

    @endforelse

</div>


<style>

.timeline-wrapper{
    display:flex;
    align-items:center;
    justify-content:space-between;
}

.timeline-step{
    text-align:center;
}

.timeline-icon{
    width:55px;
    height:55px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
}

.timeline-line{
    flex:1;
    height:5px;
    background:#dee2e6;
    margin:0 10px;
    border-radius:10px;
}

.timeline-line.active{
    background:#0dcaf0;
}

.timeline-line.active-success{
    background:#198754;
}

</style>

@endsection