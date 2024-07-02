@extends('front/layout/template')

@section('title', $penulis->name)

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 d-lg-none mb-4 mb-lg-0">
          <div class="card">
            <div class="card-body">
              <div class="d-flex">
                @if (empty($penulis->avatar))
                <img src="{{ asset('images/user.png') }}" alt="#" class="rounded-circle bulat" width="60">
                @else
                <img src="{{ asset('images/admin/'.$penulis->avatar) }}" alt="#" class="rounded-circle bulat" width="60">
                @endif
                <div class="ms-3">
                  <h5 class="text-dark">{{ $penulis->name }}</h5>
                  <small><i class="fal fa-file-alt me-2"></i>{{ $penulis->konten_count }} konten</small>
                </div>
              </div>
              <hr>
              <h6 class="text-dark">Bio :</h6>
              <p>{{ $penulis->biografi }}</p>
              <h6 class="text-dark">Sosial :</h6>
              <a class="mt-2" href="{{ $penulis->facebook }}"><i class="icon fab fa-facebook-f me-2"></i></a>
              <a class="mt-2" href="{{ $penulis->xtwitter }}"><i class="icon fab fa-twitter me-2"></i></a>
              <a class="mt-2" href="{{ $penulis->instagram }}"><i class="icon fab fa-instagram me-2"></i></a>
              <a class="mt-2" href="{{ $penulis->youtube }}"><i class="icon fab fa-youtube me-2"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <h5 class="text-dark m-0">Konten :</h5>
          <div class="row">
            @foreach ($konten as $item)
            <div class="col-md-6 mt-4">
              <a href="{{ url('/'.$item->Kategori->slug.'/'.$item->slug) }}">
                <div class="card">
                  <figure>
                    <img src="{{ asset('images/konten/'.$item->img) }}" alt="{{ $item->judul }}" class="banner w-100">
                  </figure>
                  <div class="card-body">
                    <div class="mb-2 post-meta">
                      @if ($item->type == 2)
                      <span class="post-vidio me-2"><i class="fal fa-play me-1"></i> Vidio</span>
                      @endif
                      <span class="post-category me-2" style="background-color: {{ $item->kategori->warna }} !important"><i class="fal fa-bookmark me-1"></i>{{ $item->kategori->nama }}</span>
                    </div>
                    <h5 class="text-dark mb-0">{{ $item->judul }}</h5>
                    <span class="post-date"><small>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</small></span>
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
        <div class="col-lg-4 d-none d-lg-block">
          <div class="card">
            <div class="card-body">
              @if (empty($penulis->avatar))
              <img src="{{ asset('images/user.png') }}" alt="#" class="rounded-circle bulat" width="100">
              @else
              <img src="{{ asset('images/admin/'.$penulis->avatar) }}" alt="#" class="rounded-circle bulat" width="100">
              @endif
              <h5 class="text-dark mt-3">{{ $penulis->name }}</h5>
              <small><i class="fal fa-file-alt me-2"></i>{{ $penulis->konten_count }} konten</small>
              <hr>
              <h6 class="text-dark">Bio :</h6>
              <p>{{ $penulis->biografi }}</p>
              <h6 class="text-dark">Sosial :</h6>
              <a class="mt-2 d-block" href="{{ $penulis->facebook }}"><i class="icon fab fa-facebook-f me-2"></i>{{ $penulis->facebook }}</a>
              <a class="mt-2 d-block" href="{{ $penulis->xtwitter }}"><i class="icon fab fa-twitter me-2"></i>{{ $penulis->xtwitter }}</a>
              <a class="mt-2 d-block" href="{{ $penulis->instagram }}"><i class="icon fab fa-instagram me-2"></i>{{ $penulis->instagram }}</a>
              <a class="mt-2 d-block" href="{{ $penulis->youtube }}"><i class="icon fab fa-youtube me-2"></i>{{ $penulis->youtube }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection