<header class="bg-white fixed-top">
  <div class="top-bar py-3">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-4 d-lg-block d-none">
          @auth
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ asset('images/user.png') }}" alt="#" width="25" class="bulat rounded-circle me-2">{{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('/dashboard') }}"><i class="far fa-tachometer-alt me-2"></i>Dashboard</a></li>
              <li><a class="dropdown-item" href="{{ url('/liked-konten') }}"><i class="fal fa-thumbs-up me-2"></i>Konten yang disukai</a></li>
              <li><a class="dropdown-item" href="{{ url('/riwayat') }}"><i class="fal fa-list-alt me-2"></i>Riwayat Baca</a></li>
              <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fal fa-cog me-2"></i>Pengaturan</a></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="far fa-sign-out me-2"></i>Keluar</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </ul>
          </div>
          {{-- <a href="{{ url('/dashboard') }}" class="btn btn-primary"><i class="far fa-user-circle me-2"></i>Dashboard</a> --}}
          @else
          <a href="{{ url('/login') }}" class="btn btn-primary"><i class="fal fa-user-circle"></i> Masuk / Daftar</a>
          @endauth
        </div>
        <div class="col-lg-4 col-5 text-lg-center">
          <div class="">
            <a href="{{ url('/') }}"><img src="{{ asset('assets-front/assets/img/logo.png') }}" alt="#" height="30"></a>
          </div>
        </div>
        <div class="col-lg-4 col-7 text-end">
          <a href="{{ route('trending') }}" class="btn btn-light me-2">
            <i class="fal fa-rocket me-2"></i>Trending
          </a>
          <a href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom" class="btn btn-light d-lg-none">
            <i class="fal fa-search"></i>
          </a>
          <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-light d-lg-inline-block d-none">
            <i class="fal fa-search"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-dark py-2 py-lg-0" @if(Route::is('listkategori','konten-detail')) style="background-color: {{ $kategori->warna }} !important" @endif>
    <div class="container">
      <div class="nav-kat d-lg-block d-none">
        <div>
          <a href="{{ url('/') }}" class="{{ Route::is('home') ? ' active' : '' }}">All</a>
          @foreach ($kategorinav as $item)
          <a class="@if (Route::is('listkategori','konten-detail') && $kategori->slug == $item->slug) active @endif" href="{{ url('/'.$item->slug) }}">{{ $item->nama }}</a>
          @endforeach
        </div>
      </div>
      <div class="d-lg-none">
        <div class="row">
          <div class="col-8">
            @auth
            <div class="dropdown">
              <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('images/user.png') }}" alt="#" width="25" class="bulat rounded-circle me-2">{{ Auth::user()->name }}
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('/dashboard') }}"><i class="far fa-tachometer-alt me-2"></i>Dashboard</a></li>
                <li><a class="dropdown-item" href="{{ url('/liked-konten') }}"><i class="fal fa-thumbs-up me-2"></i>Konten yang disukai</a></li>
                <li><a class="dropdown-item" href="{{ url('/riwayat') }}"><i class="fal fa-list-alt me-2"></i>Riwayat Baca</a></li>
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fal fa-cog me-2"></i>Pengaturan</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="far fa-sign-out me-2"></i>Keluar</a></li>
              </ul>
            </div>
            {{-- <a href="{{ url('/login') }}" class="btn btn-dark"><img src="{{ asset('images/user.png'. Auth::user()->avatar) }}" alt=""> {{ Auth::user()->name }}</a> --}}
            @else
            <a href="{{ url('/login') }}" class="btn btn-light"><i class="fal fa-user-circle"></i> Masuk / Daftar</a>
            @endauth
          </div>
          <div class="col-4 text-end">
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" class="btn btn-dark"><i class="fal fa-bars"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">&nbsp;</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body menu">
    <a href="{{ url('/') }}" class="{{ Route::is('home') ? ' active' : '' }}"><i class="fal fa-home-alt me-2"></i>Beranda</a>
    <a href="{{ route('trending') }}"><i class="fal fa-rocket me-2"></i>Trending</a>
    <hr>
    @foreach ($kategorinav as $item)
    <a class="@if (Route::is('listkategori') && $kategori->slug == $item->slug) active @endif" href="{{ url('/'.$item->slug) }}">{{ $item->nama }}</a>
    @endforeach
    <hr>
    <a href="{{ route('fronttentang')}}">Tentang Kami</a>
    <a href="{{ route('kontak')}}">Kontak</a>
    <a href="{{ route('syaratketentuan')}}">Syarat Ketentuan</a>
    <a href="{{ route('kebijakanprivasi')}}">Kebijakan Privasi</a>
    <a href="{{ route('frontbantuan')}}">Bantuan (Faq)</a>
    <hr>
    <a href="detail.html"><i class="fab fa-facebook-f me-2"></i>Facebook</a>
    <a href="detail.html"><i class="fab fa-instagram me-2"></i>Instagram</a>
    <a href="detail.html"><i class="fab fa-twitter me-2"></i>Twitter</a>
    <a href="detail.html"><i class="fab fa-youtube me-2"></i>Youtube</a>
  </div>
</div>