@extends('panel/layout/template')

@section('title', 'Pesan Masuk')

@section('content')

<h1 class="h3 mb-3"><strong>Pesan</strong> Masuk</h1>

<div class="row">
  @forelse ($data as $item)
  <div class="col-md-6 mb-3">
    <div class="card">
      <div class="card-body">
        <h5 class="text-dark">Judul Pesan : {{ $item->judul_pesan }}</h5>
        <p>Pesan : {{ $item->pesan }}</p>
        <div><i class="fal fa-user me-2"></i>{{ $item->nama }}</div>
        <div><i class="fal fa-envelope me-2"></i>{{ $item->email }}</div>
        <i class="fal fa-calendar-alt me-2"></i>{{ $item->created_at }}
      </div>
    </div>
  </div>
  @empty
  <div class="col-md-12 text-center">
    Tidak ada pesan
  </div>
  @endforelse
</div>
<div class="d-flex justify-content-center">
  {{ $data->onEachSide(0)->links() }}
</div>

@endsection