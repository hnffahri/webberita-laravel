@extends('panel/layout/template')

@section('title', 'Detail Konten')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Detail</strong> Konten</h1>
  </div>
  <div class="col-6 text-end">
    <a href="{{ url('panel/konten') }}" class="btn btn-primary"><i class="fal fa-chevron-left me-2"></i>Kembali</a>
  </div>
</div>

<div class="card flex-fill">
  <div class="card-body">
    <h2 class="text-dark">{{ $konten->judul }}</h2>
    <div class="mb-3">
      {{ $konten->created_at }} · {{ $konten->Kategori->nama }} · {{ $konten->views }} Views · {{ $konten->Admin->name }}
    </div>
    <div class="mb-3">
      @if ($konten->type == 2)
      <video class="vidio-detail" controls>
        <source src="{{ asset('vidio/konten/'.$konten->vidio) }}" type="video/mp4">
      </video>
      @else
      <img src="{{ asset('images/konten/'.$konten->img) }}" alt="{{ $konten->judul }}" class="banner border rounded w-100">
      @endif
    </div>
    <div class="mb-3">
      {!! $konten->isi !!}
    </div>
    Keyword : 
    @foreach (explode(',', $konten->keyword) as $stop)
    <span class="badge bg-info fw-normal fs-normal">{{ $stop }}</span>
    @endforeach 

  </div>
</div>

@endsection