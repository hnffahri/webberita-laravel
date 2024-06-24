@extends('panel/layout/template')

@section('title', 'Pesan Masuk')

@section('content')

<h1 class="h3 mb-3"><strong>Pesan</strong> Masuk</h1>

<div class="row">
  @forelse ($data as $item)
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="fw-bold text-dark">Judul Pesan :</div>
        <h5 class="text-dark">{{ $item->judul_pesan }}</h5>
        <p><span class="fw-bold text-dark">Pesan</span> : {{ $item->pesan }}</p>
        <div><i class="fal fa-user me-2"></i>{{ $item->nama }}</div>
        <div><i class="fal fa-envelope me-2"></i>{{ $item->email }}</div>
        <i class="fal fa-calendar-alt me-2"></i>{{ $item->created_at }}
      </div>
    </div>
  </div>
  @empty
  <div class="col-md-12 text-center mt-5">
    <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
    <div class="mt-4">Tidak ada pesan</div>
  </div>
  @endforelse
</div>

{{ $data->onEachSide(0)->links() }}

@endsection