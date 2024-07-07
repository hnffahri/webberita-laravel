@extends('front/layout/template')

@section('title', 'Tentang Kami')

@section('content')


<main>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row mb-4">
        <div class="col-lg-8">
          <h1 class="text-dark m-0 d-inline-block">{{ $data->judul }}</h1>
        </div>
      </div>
      <div class="row align-items-end">
        <div class="col-lg-5 mb-lg-5 mb-4">
          {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo" height="50" class="mb-3"> --}}
          <div>{!! $data->tentang_kami !!}</div>
        </div>
        <div class="col-lg-7">
          <img src="{{ asset('images/'.$data->img) }}" alt="Images Visi" class="banner w-100">
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-warning">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 order-1 text-end">
          <img src="{{ asset('images/'.$data->imgvisi) }}" alt="#" class="visimisi-images bulat position-sticky" style="top: 200px">
        </div>
        <div class="col-lg-4 mb-4 mb-lg-0 order-lg-1">
          <h1 class="text-dark">Visi</h1>
          {!! $data->visi !!}
        </div>
      </div>
      <div class="row justify-content-end mt-4">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <h1 class="text-dark">Misi</h1>
          {!! $data->misi !!}
        </div>
        <div class="col-lg-4">
          <img src="{{ asset('images/'.$data->imgmisi) }}" alt="Images Misi" class="visimisi-images bulat position-sticky" style="top: 200px">
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
          <h2 class="text-dark">Kelompok tim anggota berbakat</h2>
          Kami adalah tim yang erat dan terdiri dari individu-individu yang bersemangat tentang segala hal
        </div>
      </div>
      <div class="swiper myGSwiper mt-4">
        <div class="swiper-wrapper">
          @foreach ($tim as $item)
          <div class="swiper-slide">
            <div class="card text-center">
              <div class="card-body py-4">
                <img src="{{ asset('images/tim/'.$item->avatar) }}" alt="{{ $item->nama }}" class="bulat rounded-circle" width="100">
                <h4 class="text-dark mb-1 mt-3">
                  {{$item->nama}}
                </h4>
                <small>{{$item->posisi}}</small>
                <div class="mt-3">
                  <a class="mt-2" href="{{$item->facebook}}"><i class="icon bi bi-facebook me-2"></i></a>
                  <a class="mt-2" href="{{$item->xtwitter}}"><i class="icon bi bi-twitter me-2"></i></a>
                  <a class="mt-2" href="{{$item->instagram}}"><i class="icon bi bi-instagram me-2"></i></a>
                  <a class="mt-2" href="{{$item->youtube}}"><i class="icon bi bi-youtube me-2"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</main>

@endsection

@push('css')
@vite('resources/css/swiper.css')
@endpush

@push('js')
@vite('resources/js/swiper.js')
@endpush