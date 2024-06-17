<nav id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="{{ url('panel') }}">
      <span class="align-middle">WebBerita</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-header">
        Pages
      </li>

      <li class="sidebar-item {{ Route::is('dashboard') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('konten*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/konten') }}">
          <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Konten</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('kategori*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/kategori') }}">
          <i class="align-middle" data-feather="list"></i> <span class="align-middle">Kategori</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('pesan*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/pesan') }}">
          <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Pesan</span>
        </a>
      </li>

      <li class="sidebar-header">
        SEO dan Analytics
      </li>
      <li class="sidebar-item {{ Route::is('statistik*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/statistik') }}">
          <i class="align-middle" data-feather="pie-chart"></i> <span class="align-middle">Statistik Website</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('seo*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/seo') }}">
          <i class="align-middle" data-feather="hash"></i> <span class="align-middle">Pengaturan SEO</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('google-analytics*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/google-analytics') }}">
          <i class="align-middle" data-feather="bar-chart"></i> <span class="align-middle">Google Analytics</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('facebook-pixel*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/facebook-pixel') }}">
          <i class="align-middle" data-feather="facebook"></i> <span class="align-middle">Facebook Pixel</span>
        </a>
      </li>

      <li class="sidebar-header">
        Pengaturan
      </li>
      <li class="sidebar-item {{ Route::is('profile*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/profile') }}">
          <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('password*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/password') }}">
          <i class="align-middle" data-feather="lock"></i> <span class="align-middle">Password</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('syarat-ketentuan*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/syarat-ketentuan') }}">
          <i class="align-middle" data-feather="file"></i> <span class="align-middle">Syarat Ketentuan</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('kebijakan-privasi*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/kebijakan-privasi') }}">
          <i class="align-middle" data-feather="file"></i> <span class="align-middle">Kebijakan Privasi</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('sosial-media*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/sosial-media') }}">
          <i class="align-middle" data-feather="link"></i> <span class="align-middle">Sosial Media</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('tentang*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/tentang') }}">
          <i class="align-middle" data-feather="info"></i> <span class="align-middle">Tentang Kami</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('member*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/member') }}">
          <i class="align-middle" data-feather="users"></i> <span class="align-middle">Member</span>
        </a>
      </li>
      <li class="sidebar-item {{ Route::is('user*') ? ' active' : '' }}">
        <a class="sidebar-link" href="{{ url('panel/user') }}">
          <i class="align-middle" data-feather="users"></i> <span class="align-middle">User Admin</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Keluar</span>
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</nav>