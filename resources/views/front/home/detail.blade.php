@extends('front/layout/template')

@section('title', $konten->judul)

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="post-meta mb-2">
            <span class="post-category me-3" style="background-color: {{ $konten->kategori->warna }} !important"><i class="fal fa-bookmark me-1"></i>{{ $konten->kategori->nama }}</span><a href="{{ url('penulis/'.$konten->Admin->username) }}" class="small"><i class="fal fa-user me-1"></i>{{ $konten->Admin->name }}</a>
          </div>
          <h1 class="text-dark">{{ $konten->judul }}</h1>
          <div class="post-meta">
            <small><i class="fal fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($konten->created_at)->translatedFormat('d F Y') }} <i class="fal fa-clock me-2 ms-2"></i>{{ \Carbon\Carbon::parse($konten->created_at)->format('H:i') }} WIB</small>
          </div>
          <div class="my-4">
            @if ($konten->type == 2)
            <video class="vidio-detail" controls>
              <source src="{{ asset('vidio/konten/'.$konten->vidio) }}" type="video/mp4">
            </video>
            @else
            <img src="{{ asset('images/konten/'.$konten->img) }}" alt="#" class="w-100">
            @endif
          </div>
          <div class="isi-konten">
            {!! $konten->isi !!}
          </div>
          <div class="mt-4">
            <a href="#" class="btn btn-light"><i class="fal fa-thumbs-up me-2"></i>Like</a>
            <a href="#" class="btn btn-light ms-2"><i class="fal fa-bookmark me-2"></i>Simpan</a>
          </div>
          <div class="card card-body mt-4">
            <div class="row align-items-center">
              <div class="col-12">
                <div class="sosmed">
                  Share :
                  <a href="#" class="ms-3 btn btn-dark"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="ms-3 btn btn-dark"><i class="fab fa-twitter"></i></a>
                  <a href="#" class="ms-3 btn btn-dark"><i class="fab fa-instagram"></i></a>
                  <a href="#" class="ms-3 btn btn-dark"><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card">
            <div class="card-body">
              <h5 class="text-dark font m-0" style="border-color: {{ $kategori->warna }} !important">Trending Di {{ $kategori->nama }}</h5>
            </div>
            <div class="">
              @foreach ($trending as $item)
              <div class="card-body border-top trending">
                <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
                  <div class="d-flex">
                    <div class="number">{{ $loop->iteration }}</div>
                    <div class="text">
                      <div class="post-meta">
                        @if ($item->type == 2)
                        <span class="post-vidio me-2"><i class="fal fa-play me-1"></i> Vidio</span>
                        @endif
                      </div>
                      <h5 class="text-dark">
                        {{ $item->judul }}
                      </h5>
                      <div class="post-meta">
                        <span class="post-date"><small>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</small></span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection