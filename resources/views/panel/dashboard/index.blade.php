@extends('panel/layout/template')

@section('title', 'Dashboard')

@section('content')

{{-- <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1> --}}
<div class="row">
  <div class="col-xl-3 col-md-6">
      <a href="{{ url('panel/artikel') }}">
          <div class="card">
              <div class="card-body">
                  <div class="row align-items-center mb-3">
                      <div class="col">
                          Artikel
                      </div>
                      <div class="col-auto">
                          <i class="fal fa-file-alt"></i>
                      </div>
                  </div>
                  <h1 class="m-0">{{ $artikelCount }}</h1>
              </div>
          </div>
      </a>
  </div>
  <div class="col-xl-3 col-md-6">
      <a href="{{ url('panel/kategori') }}">
          <div class="card">
              <div class="card-body">
                  <div class="row align-items-center mb-3">
                      <div class="col">
                          Kategori
                      </div>
                      <div class="col-auto">
                          <i class="fal fa-file-alt"></i>
                      </div>
                  </div>
                  <h1 class="m-0">{{ $kategoriCount }}</h1>
              </div>
          </div>
      </a>
  </div>
  <div class="col-xl-3 col-md-6">
      <a href="{{ url('panel/pesan') }}">
          <div class="card">
              <div class="card-body">
                  <div class="row align-items-center mb-3">
                      <div class="col">
                          Pesan
                      </div>
                      <div class="col-auto">
                          <i class="fal fa-file-alt"></i>
                      </div>
                  </div>
                  <h1 class="m-0">{{ $pesanCount }}</h1>
              </div>
          </div>
      </a>
  </div>
  <div class="col-xl-3 col-md-6">
      <a href="{{ url('panel/member') }}">
          <div class="card">
              <div class="card-body">
                  <div class="row align-items-center mb-3">
                      <div class="col">
                          Member
                      </div>
                      <div class="col-auto">
                          <i class="fal fa-file-alt"></i>
                      </div>
                  </div>
                  <h1 class="m-0">{{ $memberCount }}</h1>
              </div>
          </div>
      </a>
  </div>
</div>

<h1 class="h3 mb-3"><strong>Konten</strong> Trending</h1>
<div class="row">
  @forelse ($konten as $item)
  <div class="col-lg-4">
    <div class="card">
      <img src="{{ asset('images/konten/'.$item->img) }}" alt="{{ $item->judul }}" class="w-100 banner card-img-top">
      <div class="card-body">
        <p class="mb-1"><i class="fal fa-bookmark me-2"></i>{{ $item->kategori->nama }}</p>
        <h4 class="text-dark">
          {{ $item->judul }}
        </h4>
        <p>
          @if ($item->type == 1)
          <span class="badge bg-info">Artikel</span>
          @else
          <span class="badge bg-info">Vidio</span>
          @endif

          @if ($item->status == 1)
          <span class="badge mx-2 bg-success">Aktif</span>
          @else
          <span class="badge mx-2 bg-warning">Tidak Aktif</span>
          @endif
          {{ $item->views }} Views
        </p>
        <p class="m-0">
          <small><i class="fal fa-calendar-alt me-2"></i>{{$item->created_at}}</small>
          <small class="ms-3"><i class="fal fa-user me-2"></i>{{ $item->admin->name }}</small>
        </p>
      </div>
    </div>
  </div>
  @empty
  <div class="col-12">
    <div class="text-center mt-5">
      <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
      <div class="mt-4">Tidak ada konten</div>
    </div>
  </div>
  @endforelse
</div>

<div class="row align-items-center">
  <div class="col-8">
    <h1 class="h3 mb-3"><strong>Pesan</strong> Hari Ini</h1>
  </div>
  <div class="col-4 text-end">
    <a href="{{ url('panel/pesan') }}" class="btn btn-primary">Lihat Semua</a>
  </div>
</div>

<div class="row mt-3">
  @forelse ($pesan as $item)
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div>Judul Pesan :</div>
        <h5 class="text-dark">{{ $item->judul_pesan }}</h5>
        <p>Pesan : {{ $item->pesan }}</p>
        <div><i class="fal fa-user me-2"></i>{{ $item->nama }}</div>
        <div><i class="fal fa-envelope me-2"></i>{{ $item->email }}</div>
        <i class="fal fa-calendar-alt me-2"></i>{{ $item->created_at }}
      </div>
    </div>
  </div>
  @empty
  <div class="text-center mt-5">
    <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
    <div class="mt-4">Tidak ada pesan</div>
  </div>
  @endforelse
</div>

@endsection