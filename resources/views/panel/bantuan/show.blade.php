@extends('panel/layout/template')

@section('title', 'Detail Bantuan')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Detail</strong> Bantuan</h1>
  </div>
  <div class="col-6 text-end">
    <a href="{{ url('panel/bantuan') }}" class="btn btn-primary"><i class="bi bi-chevron-left me-2"></i>Kembali</a>
  </div>
</div>

<div class="card flex-fill">
  <div class="card-body">
    <h2 class="text-dark">{{ $bantuan->judul }}</h2>
    <div class="mb-3">
      {{ $bantuan->created_at }} · {{ $bantuan->views }} Views
    </div>
    @if(!empty($bantuan->img))
      <div class="mb-3">
        <img src="{{ asset('images/bantuan/'.$bantuan->img) }}" alt="{{ $bantuan->judul }}" class="banner border rounded w-100">
      </div>
    @endif
    <div class="mb-3">
      {!! $bantuan->isi !!}
    </div>
    Keyword : 
    @foreach (explode(',', $bantuan->keyword) as $stop)
    <span class="badge bg-info fw-normal fs-normal">{{ $stop }}</span>
    @endforeach 

  </div>
</div>

@endsection