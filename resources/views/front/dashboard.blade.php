@extends('front/layout/templatedashboard')

@section('title', 'Dashboard')

@section('content')


<div class="card card-body">
  <h5 class="text-dark">Hi, {{ Auth::user()->name }} Selamat Datang di Dashboard Member</h5>
  Selamat datang di dashboard member. Nikmati kemudahan akses berita yang anda sukai.
</div>


<div class="card mt-4">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center w-100">
      <h5 class="text-dark m-0">Konten yang disukai</h5>
      <a href="#" class="btn btn-primary">Lihat Semua</a>
    </div>
  </div>
  <div class="">
    @if($likedKonten->isEmpty())
    <div class="card-body border-top">
      <div class="text-center py-4">
        <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
        <div class="mt-4">Kamu belum menyukai konten apapun</div>
      </div>
    </div>
    @else
    @foreach($likedKonten as $konten)
    <div class="card-body border-top">
      <a href="{{ url('/'.$konten->Kategori->slug.'/'.$konten->slug) }}">
        <div class="d-flex align-items-center">
          <div class="me-3 w-100">
            <h6 class="text-dark">{{ $konten->judul }}</h6>
            <div class="mt-2">
              @if ($konten->type == 2)
              <span class="post-vidio me-2"><i class="fal fa-play me-1"></i> Vidio</span>
              @endif
              <span class="post-date"><small>{{ \Carbon\Carbon::parse($konten->created_at)->locale('id')->diffForHumans() }}</small></span>
            </div>
          </div>
          <img src="{{ asset('images/konten/'.$konten->img) }}" alt="{{ $konten->judul }}" alt="#" class="bulat radius-10" width="80">
        </div>
      </a>
    </div>
    @endforeach
    @endif

  </div>
</div>

@endsection

{{-- <x-app-layout>

</x-app-layout> --}}
