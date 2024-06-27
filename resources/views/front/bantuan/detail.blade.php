@extends('front/layout/template')

@section('title', $bantuan->judul)

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h1 class="text-dark mb-3">{{ $bantuan->judul }}</h1>
          <div class="post-meta">
            <small><i class="fal fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($bantuan->created_at)->translatedFormat('d F Y') }} <i class="fal fa-clock me-2 ms-2"></i>{{ \Carbon\Carbon::parse($bantuan->created_at)->format('H:i') }} WIB</small>
          </div>
          <div class="my-4">
            @if (!empty($bantuan->img))
            <img src="{{ asset('images/bantuan/'.$bantuan->img) }}" alt="#" class="w-100">
            @endif
          </div>
          <div class="isi-bantuan">
            {!! $bantuan->isi !!}
          </div>
          <div class="card card-body mt-4">
            <div class="row align-items-center">
              <div class="col-12">
                <div class="sosmed">
                  Share :
                  <a href="#" class="ms-3 btn-sm btn btn-dark"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="ms-3 btn-sm btn btn-dark"><i class="fab fa-twitter"></i></a>
                  <a href="#" class="ms-3 btn-sm btn btn-dark"><i class="fab fa-instagram"></i></a>
                  <a href="#" class="ms-3 btn-sm btn btn-dark"><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card">
            <div class="card-body">
              <h5 class="text-dark font m-0">Bantuan Lainnya</h5>
            </div>
            <div class="">
              @foreach ($bantuanlainnya as $item)
              <div class="card-body border-top trending">
                <a href="{{ url('bantuan/'.$item->slug) }}">
                  <div class="d-flex">
                    <div class="number">{{ $loop->iteration }}</div>
                    <div class="text">
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
          <div class="card mt-4">
            <div class="card-body text-center">
              <h5 class="text-dark">Follow Us</h5>
              <p>Follow us on Social Network</p>
              <div>
                <a class="mt-2" href="#"><i class="icon fab fa-facebook-f me-2"></i></a>
                <a class="mt-2" href="#"><i class="icon fab fa-twitter me-2"></i></a>
                <a class="mt-2" href="#"><i class="icon fab fa-instagram me-2"></i></a>
                <a class="mt-2" href="#"><i class="icon fab fa-youtube me-2"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
{{-- @push('js')
    
@endpush --}}
@endsection