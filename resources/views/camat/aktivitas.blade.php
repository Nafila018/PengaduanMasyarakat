@extends('layouts.camat')

@section('title','Aktivitas camat')

@section('content')

<div class="card-custom">
    <h3>Aktivitas camat</h3>

    @foreach($aktivitasAdmin as $item)
    <div class="mb-3">
        {{ $item->created_at }}
    </div>
    @endforeach
</div>

@endsection