@extends('front/layout/template')

@section('title', 'Cari')

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('cari') }}" method="GET" class="card search-canvas w-100">
                <div class="d-flex align-items-center">
                  <i class="bi bi-search"></i>
                  <input type="search" name="query" id="query" class="form-control" placeholder="Ketik disini..." value="{{ request('query') }}">
                  <button type="submit" class="btn btn-primary">Cari</button>
                </div>
              </form>
            </div>
          </div>
          <div class="mt-3">Hasil Pencarian :</div>
          @if(request()->has('query'))
            @if(isset($cari) && $cari->isEmpty())
            <div class="text-center mt-4">
              <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
              <div class="mt-4">Kata Kunci <strong class="text-dark">{{ request('query') }}</strong> tidak ditemukan</div>
            </div>
            @elseif(empty(request('query')))
            <div class="text-center mt-4">
              <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
              <div class="mt-4">Silakan masukkan kata kunci untuk mencari konten</div>
            </div>
            @elseif(isset($cari))
            @foreach($cari as $item)
              <div class="card card-body mt-3">
                <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
                  <div class="d-flex align-items-center">
                    <div class="me-3 w-100">
                      <h6 class="text-dark">{{ $item->judul }}</h6>
                      <div class="post-meta">
                        @if ($item->type == 2)
                        <span class="post-vidio me-2"><i class="bi bi-play me-1"></i> Vidio</span>
                        @endif
                        <span class="post-date"><small>{{ $item->created_at->diffForHumans() }}</small></span>
                      </div>
                    </div>
                    <img src="{{ asset('images/konten/'.$item->img) }}" alt="{{ $item->judul }}" class="bulat radius-10" width="80">
                  </div>
                </a>
              </div>
            @endforeach
            <div class="paginate-custom mt-4">
              {{ $cari->appends(['query' => $query])->onEachSide(0)->links() }}
            </div>
            @endif
          @else
          <div class="text-center mt-4">
            <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
            <div class="mt-4">Silakan masukkan kata kunci untuk mencari konten</div>
          </div>
          @endif
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card">
            <div class="card-body">
              <h5 class="text-dark font m-0">Trending</h5>
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
                        <span class="post-date"><small>{{ $item->created_at->diffForHumans() }}</small></span>
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