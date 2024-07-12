<header class="bg-white fixed-top">
  <div class="top-bar py-3">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-4 d-lg-block d-none">
          @auth
          <div class="dropdown">
            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle me-2"></i>Hi, {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('/dashboard') }}"><i class="bi bi-speedometer me-2"></i>Dashboard</a></li>
              <li><a class="dropdown-item" href="{{ url('/liked-konten') }}"><i class="bi bi-hand-thumbs-up me-2"></i>Konten yang disukai</a></li>
              <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-left me-2"></i>Keluar</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </ul>
          </div>
          {{-- <a href="{{ url('/dashboard') }}" class="btn btn-primary"><i class="bi bi-user-circle me-2"></i>Dashboard</a> --}}
          @else
          <a href="{{ url('/login') }}" class="btn btn-outline-light"><i class="bi bi-person-circle me-2"></i>Masuk / Daftar</a>
          @endauth
        </div>
        <div class="col-lg-4 col-5 text-lg-center">
          <div class="">
            <a href="{{ url('/') }}"><img src="{{ asset('images/'.$tentang->logo) }}" alt="#" height="50"></a>
          </div>
        </div>
        <div class="col-lg-4 col-7 text-end">
          <a href="{{ route('trending') }}" class="btn btn-outline-light me-2">
            <i class="bi bi-rocket me-2"></i>Trending
          </a>
          <a href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom" class="btn btn-outline-light d-lg-none">
            <i class="bi bi-search"></i>
          </a>
          <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-light d-lg-inline-block d-none">
            <i class="bi bi-search"></i>
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
              <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle me-2"></i>Hi, {{ Auth::user()->name }}
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('/dashboard') }}"><i class="bi bi-speedometer me-2"></i>Dashboard</a></li>
                <li><a class="dropdown-item" href="{{ url('/liked-konten') }}"><i class="bi bi-hand-thumbs-up me-2"></i>Konten yang disukai</a></li>
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-left me-2"></i>Keluar</a></li>
              </ul>
            </div>
            {{-- <a href="{{ url('/login') }}" class="btn btn-dark"><img src="{{ asset('images/user.png'. Auth::user()->avatar) }}" alt=""> {{ Auth::user()->name }}</a> --}}
            @else
            <a href="{{ url('/login') }}" class="btn btn-outline-light"><i class="bi bi-person-circle me-2"></i>Masuk / Daftar</a>
            @endauth
          </div>
          <div class="col-4 text-end">
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" class="btn btn-outline-light"><i class="bi bi-list"></i></a>
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
    <a href="{{ url('/') }}" class="{{ Route::is('home') ? ' active' : '' }}"><i class="bi bi-house me-2"></i>Beranda</a>
    <a href="{{ route('trending') }}"><i class="bi bi-rocket me-2"></i>Trending</a>
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
    <h6 class="text-dark mb-3">Follow :</h6>
    <a target="_blank" href="{{ $sosmed->facebook }}"><i class="icon bi bi-facebook me-2"></i>Facebook</a>
    <a target="_blank" href="{{ $sosmed->twitter }}"><i class="icon bi bi-twitter me-2"></i>Twitter</a>
    <a target="_blank" href="{{ $sosmed->instagram }}"><i class="icon bi bi-instagram me-2"></i>Instagram</a>
    <a target="_blank" href="{{ $sosmed->youtube }}"><i class="icon bi bi-youtube me-2"></i>Youtube</a>
    <a target="_blank" href="{{ $sosmed->tiktok }}"><i class="icon bi bi-tiktok me-2"></i>Tiktok</a>
  </div>
</div>



  <!-- Modal Cari -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header d-block">
          <form action="{{ route('cari') }}" method="GET" class="card search-canvas w-100 mb-3">
            <div class="d-flex align-items-center">
              <i class="bi bi-search"></i>
              <input type="search" name="query" id="query" class="form-control" placeholder="Ketik kata kunci...">
              <button type="submit" class="btn btn-dark">Cari</button>
            </div>
          </form>
          <p class="m-0">Trending :</p>
        </div>
        <div class="modal-body">
          
          @foreach ($trendingcari as $item)
          <div class="modal-konten">
            <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
              <div class="d-flex align-items-center">
                <div class="me-3 w-100">
                  <h6 class="text-dark">
                    {{ $item->judul }}
                  </h6>
                  <div class="post-meta">
                    @if ($item->type == 2)
                    <span class="post-vidio me-2"><i class="bi bi-play me-1"></i> Vidio</span>
                    @endif
                    <span class="post-date"><small>{{ $item->created_at->diffForHumans() }}</small></span>
                  </div>
                </div>
                <img src="{{ asset('images/konten/'.$item->img) }}" alt="{{ $item->judul }}" class="bulat radius-10" width="60">
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  

<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header d-block border-bottom">
    <form action="{{ route('cari') }}" method="GET" class="card search-canvas w-100 mb-3">
      <div class="d-flex align-items-center">
        <i class="bi bi-search"></i>
        <input type="search" name="query" id="query" class="form-control" placeholder="Ketik kata kunci...">
        <button type="submit" class="btn btn-dark">Cari</button>
      </div>
    </form>
    <p class="m-0">Trending :</p>
  </div>
  <div class="offcanvas-body small">
    @foreach ($trendingcari as $item)
    <div class="modal-konten">
      <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
        <div class="d-flex align-items-center">
          <div class="me-3 w-100">
            <h6 class="text-dark">
              {{ $item->judul }}
            </h6>
            <div class="post-meta">
              @if ($item->type == 2)
              <span class="post-vidio me-2"><i class="bi bi-play me-1"></i> Vidio</span>
              @endif
              <span class="post-date"><small>{{ $item->created_at->diffForHumans() }}</small></span>
            </div>
          </div>
          <img src="{{ asset('images/konten/'.$item->img) }}" alt="{{ $item->judul }}" class="bulat radius-10" width="60">
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>