@extends('front/layout/template')

@section('title', 'Trending')

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="text-center">
        <h1 class="text-dark mb-4">Trending</h1>
      </div>
      <div class="row gx-0 border-top border-start">
        @foreach ($trending as $item)
        <div class="col-lg-4">
          <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
            <div class="card card-body h-100 trending">
              <div class="d-flex">
                <div class="number bg-light">{{ ($trending->currentPage() - 1) * $trending->perPage() + $loop->iteration }}</div>
                <div class="text">
                  <div class="post-meta">
                    @if ($item->type == 2)
                    <span class="post-vidio me-2"><i class="bi bi-play me-1"></i> Vidio</span>
                    @endif
                    <span class="post-category me-2" style="background-color: {{ $item->kategori->warna }} !important"><i class="bi bi-bookmark me-1"></i>{{ $item->kategori->nama }}</span>
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
      <div class="paginate-custom mt-4">
        {{ $trending->onEachSide(0)->links() }}
      </div>
    </div>
  </div>
</main>

@endsection