
<div class="col-lg-3 d-lg-block d-none mb-4 mb-lg-0">
  <div class="card card-body">
    <div class="text-lg-center d-flex d-lg-block align-items-start">
      @if (empty(Auth::user()->avatar))
      <img src="{{ asset('images/user.png') }}" alt="#" width="80" class="bulat rounded-circle">
      @else
      <img src="{{ asset('images/'.Auth::user()->avatar) }}" alt="#" width="80" class="bulat rounded-circle">
      @endif
      <div class="mt-lg-4 ms-3 ms-lg-0">
        <h5 class="text-dark mb-1">{{ Auth::user()->name }}</h5>
        <div class="small">{{ Auth::user()->email }}</div>
        <a href="{{ route('profile.edit') }}" class="btn btn-light mt-lg-4 mt-3"><i class="fal fa-edit me-2"></i>Ubah</a>
      </div>
    </div>
  </div>
  <div class="card card-body mt-4 d-none d-lg-block">
    <a href="dashboard" class="mb-3 text-start w-100 btn btn-dark"><i class="fal fa-tachometer-alt-fast me-2"></i>Dashboard</a>
    <a href="liked-konten" class="mb-3 text-start w-100 btn btn-light"><i class="fal fa-thumbs-up me-2"></i>Konten yang disukai</a>
    <a href="riwayat" class="mb-3 text-start w-100 btn btn-light"><i class="fal fa-list-alt me-2"></i>Riwayat Baca</a>
    <a href="{{ route('profile.edit') }}" class="mb-3 text-start w-100 btn btn-light"><i class="fal fa-cog me-2"></i>Pengaturan</a>
    <a class="text-start w-100 btn btn-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fal fa-sign-out me-2"></i>Keluar
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </div>
</div>