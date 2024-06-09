
<div class="col-lg-3">
  <div class="card card-body">
    <div class="text-center">
      @if (empty(Auth::user()->avatar))
      <img src="{{ asset('images/user.png') }}" alt="#" width="100" class="bulat rounded-circle">
      @else
      <img src="{{ asset('images/'.Auth::user()->avatar) }}" alt="#" width="100" class="bulat rounded-circle">
      @endif
      <div class="my-4">
        <h5 class="text-dark mb-1">{{ Auth::user()->name }}</h5>
        <small>{{ Auth::user()->email }}</small>
      </div>
      <a href="{{ route('profile.edit') }}" class="btn btn-light"><i class="fal fa-edit me-2"></i>Ubah</a>
    </div>
  </div>
  <div class="card card-body mt-4">
    <a href="dashboard" class="mb-3 text-start btn btn-dark"><i class="fal fa-tachometer-alt-fast me-2"></i>Dashboard</a>
    <a href="komentar-saya" class="mb-3 text-start btn btn-light"><i class="fal fa-comment me-2"></i>Komentar Saya</a>
    <a href="riwayat" class="mb-3 text-start btn btn-light"><i class="fal fa-list-alt me-2"></i>Riwayat Baca</a>
    <a href="{{ route('profile.edit') }}" class="mb-3 text-start btn btn-light"><i class="fal fa-cog me-2"></i>Pengaturan</a>
    <a class="text-start btn btn-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fal fa-sign-out me-2"></i>Keluar
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </div>
</div>