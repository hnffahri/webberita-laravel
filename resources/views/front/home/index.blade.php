@extends('front/layout/template')

@section('title', 'Home')

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container headline">
      {{-- <div class="text-center">
        <h1 class="text-dark font">Latest Post</h1>
      </div> --}}
      <div class="row">
        @if ($terbaru)
        <div class="col-lg-7 mt-4">
          <a href="{{ url('/'.$terbaru->kategori->slug.'/'.$terbaru->slug) }}">
            <div class="post post-thumb">
              <div class="post-img">
                <img src="{{ asset('images/konten/'.$terbaru->img) }}" alt="{{ $terbaru->judul }}" class="banner">
              </div>
              <div class="post-body">
                <div class="post-meta">
                  @if ($terbaru->type == 2)
                  <span class="post-vidio me-2"><i class="fal fa-play me-1"></i> Vidio</span>
                  @endif
                  <span class="post-category me-2" style="background-color: {{ $terbaru->kategori->warna }} !important"><i class="fal fa-bookmark me-1"></i>{{ $terbaru->kategori->nama }}</span>
                </div>
                <h2 class="text-white">
                  {{ $terbaru->judul }}
                </h2>
                <div class="text-light ringkas">{{ $terbaru->ringkas }}</div>
                <div class="post-meta m-0">
                  <span class="post-date"><small>{{ \Carbon\Carbon::parse($terbaru->created_at)->locale('id')->diffForHumans() }}</small></span>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endif
        <div class="col-lg-5">
          @foreach ($terbaru2 as $item)
          <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
            <div class="post post-thumb mt-4">
              <div class="post-img">
                <img src="{{ asset('images/konten/'.$item->img) }}" alt="{{ $item->judul }}" class="banner-list">
              </div>
              <div class="post-body">
                <div class="post-meta">
                  @if ($item->type == 2)
                  <span class="post-vidio me-2"><i class="fal fa-play me-1"></i> Vidio</span>
                  @endif
                  <span class="post-category me-2" style="background-color: {{ $item->kategori->warna }} !important"><i class="fal fa-bookmark me-1"></i>{{ $item->kategori->nama }}</span>
                </div>
                <h4 class="text-white m-0">
                  {{ $item->judul }}
                </h4>
                <div class="post-meta m-0">
                  <span class="post-date"><small>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</small></span>
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>

    <div class="bg-dark mt-4">
      <div class="container py-4">
        <div class="swiper SwiperVidio">
          <div class="row align-items-center mb-4">
            <div class="col-6">
              <h1 class="text-white font m-0">Rekomendasi</h1>
            </div>
            <div class="col-6">
              <div class="s-button">
                <div class="swiper-button-prev me-3"></div>
                <div class="swiper-button-next"></div>
              </div>
            </div>
          </div>
          <div class="swiper-wrapper">
            @foreach ($vidio as $item)
            <div class="swiper-slide">
              <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
                <div class="listblog">
                  <figure class="mb-3">
                    <img src="{{ asset('images/konten/'.$item->img) }}" alt="#" class="bulat-vidio w-100">
                  </figure>
                  <div class="post-meta">
                    @if ($item->type == 2)
                    <span class="post-vidio me-2"><i class="fal fa-play me-1"></i> Vidio</span>
                    @endif
                    <span class="post-category me-2" style="background-color: {{ $item->kategori->warna }} !important"><i class="fal fa-bookmark me-1"></i>{{ $item->kategori->nama }}</span>
                    <span class="post-date"><small>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</small></span>
                  </div>
                  <h4 class="m-0 judul">{{ $item->judul }}</h4>
                  {{-- <div class="ringkas">{{ $item->ringkas }}</div> --}}
                </div>
              </a>
            </div>
            @endforeach
          </div>
          {{-- <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div> --}}
        </div>
      </div>
    </div>

    <div class="container-fluid mt-4">
      <img src="{{ asset('images/iklan/4064236851259938825.gif') }}" alt="#" class="w-100">
    </div>

    <div class="container mt-4">
      <hr class="mb-0">
      <hr class="mt-1">
      <div class="row mb-4 align-items-center">
        <div class="col-7">
          <h1 class="text-dark font m-0">Trending</h1>
        </div>
        <div class="col-5 text-end">
          <a href="{{ url('/trending') }}" class="btn btn-primary">Lainnya <i class="far fa-chevron-right"></i></a>
        </div>
      </div>
      <div class="row gx-0 border-top border-start">
        @foreach ($trending as $item)
        <div class="col-lg-4">
          <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
            <div class="card card-body h-100 trending">
              <div class="d-flex">
                <div class="number">{{ $loop->iteration }}</div>
                <div class="text">
                  <div class="post-meta">
                    @if ($item->type == 2)
                    <span class="post-vidio me-2"><i class="fal fa-play me-1"></i> Vidio</span>
                    @endif
                    <span class="post-category me-2" style="background-color: {{ $item->kategori->warna }} !important"><i class="fal fa-bookmark me-1"></i>{{ $item->kategori->nama }}</span>
                  </div>
                  <h5 class="text-dark">
                    {{ $item->judul }}
                  </h5>
                  <div class="post-meta">
                    <span class="post-date"><small>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</small></span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>

    @foreach ($kategoriM as $kategori)
    <div class="container mt-4">
      <hr class="mb-0">
      <hr class="mt-1">
      <div class="swiper Swiper{{ $kategori->slug }}">
        <div class="row align-items-center mb-4">
          <div class="col-7">
            <h1 class="text-dark font m-0" style="border-color: {{ $kategori->warna }} !important">{{ $kategori->nama }}</h1>
          </div>
          <div class="col-5 text-end">
            <a href="{{ url('/'.$kategori->slug) }}" class="btn btn-primary" style="background-color: {{ $kategori->warna }} !important; border-color: {{ $kategori->warna }} !important">Lainnya <i class="far fa-chevron-right"></i></a>
          </div>
        </div>
        @empty($kategori->KontenM)
        <div class="text-center">
          <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
          <div class="mt-4">Tidak ada konten</div>
        </div>
        @endempty
        <div class="swiper-wrapper">
          @foreach ($kategori->KontenM as $konten)
          <div class="swiper-slide">
            <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
              <div class="card">
                <figure>
                  <img src="{{ asset('images/konten/'.$konten->img) }}" alt="{{ $konten->judul }}" class="banner w-100">
                </figure>
                <div class="card-body">
                  <div class="mb-2">
                    @if ($konten->type == 2)
                    <span class="post-vidio me-2"><i class="fal fa-play me-1"></i> Vidio</span>
                    @endif
                    <span class="post-date"><small>{{ \Carbon\Carbon::parse($konten->created_at)->locale('id')->diffForHumans() }}</small></span>
                  </div>
                  <h5 class="text-dark mb-0">{{ $konten->judul }}</h5>
                </div>
              </div>
            </a>
          </div>
          @endforeach
          {{-- <div class="swiper-slide">
            <a href="#">
              <div class="card cardswipe-more">
                <div class="card-body text-center">
                  <h5 class="text-dark mb-0">Topik {{ $kategori->nama }} Lainnya <i class="far fa-arrow-right"></i></h5>
                </div>
              </div>
            </a>
          </div> --}}
        </div>
        <div class="row align-items-center">
          <div class="col-8">
            <div class="swiper-pagination"></div>
          </div>
          <div class="col-4">
            <div class="s-button">
              <div class="swiper-button-prev trending me-3"></div>
              <div class="swiper-button-next trending"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    @push('js')
      @foreach ($kategoriM as $kategori)
        <script>
          var swiper = new Swiper(".Swiper{{ $kategori->slug }}", {
              slidesPerView: 1,
              spaceBetween: 10,
              navigation: {
                  nextEl: '.swiper-button-next',
                  prevEl: '.swiper-button-prev',
              },
              pagination: {
                  el: ".swiper-pagination",
                  clickable: true,
              },
              breakpoints: {
                  0: {
                      slidesPerView: 1.2,
                  },
                  640: {
                      slidesPerView: 2,
                  },
                  768: {
                      slidesPerView: 4,
                  },
                  1024: {
                      slidesPerView: 3,
                  },
              },
          });
        </script>
      @endforeach
    @endpush
  </div>
</main>

@endsection