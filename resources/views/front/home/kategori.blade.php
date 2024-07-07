@extends('front/layout/template')

@section('title', $kategori->nama)

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h1 class="text-dark font m-0" style="border-color: {{ $kategori->warna }} !important">{{ $kategori->nama }}</h1>
          <div class="row">
            @foreach ($konten as $item)
            <div class="col-md-6 mt-4">
              <a href="{{ url('/'.$item->Kategori->slug.'/'.$item->slug) }}">
                <div class="card">
                  <figure>
                    <img src="{{ asset('images/konten/'.$item->img) }}" alt="{{ $item->judul }}" class="banner w-100">
                  </figure>
                  <div class="card-body">
                    <div class="mb-2">
                      @if ($item->type == 2)
                      <span class="post-vidio me-2"><i class="bi bi-play me-1"></i> Vidio</span>
                      @endif
                      <span class="post-date"><small>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</small></span>
                    </div>
                    <h5 class="text-dark mb-0">{{ $item->judul }}</h5>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
          <div class="paginate-custom mt-4">
            {{ $konten->onEachSide(0)->links() }}
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="text-dark m-0">Trending Di {{ $kategori->nama }}</h5>
            </div>
            <div class="">
              @foreach ($trending as $item)
              <div class="card-body border-top trending">
                <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
                  <div class="d-flex">
                    <div class="number bg-light">{{ $loop->iteration }}</div>
                    <div class="text">
                      <div class="post-meta">
                        @if ($item->type == 2)
                        <span class="post-vidio me-2"><i class="bi bi-play me-1"></i> Vidio</span>
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