<nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle js-sidebar-toggle">
    <i class="hamburger align-self-center"></i>
  </a>

  <div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
      <li class="nav-item dropdown">
        {{-- <a class="nav-link" href="{{ url('panel/profile') }}">
          @if (empty(Auth::user()->avatar))
          <img src="{{ asset('images/user.png') }}" alt="#" class="kotak img-fluid rounded-circle me-1" width="30">
          @else
          <img src="{{ asset('images/user/'.Auth::user()->avatar) }}" class="kotak img-fluid rounded-circle me-1" width="30" alt="#" />
          @endif
          <span class="text-dark fw-semibold">{{ Auth::user()->name }}</span>
        </a> --}}
        <a class="nav-link btn btn-primary" target="_blank" href="{{ url('../') }}">Lihat Website</a>
      </li>
    </ul>
  </div>
</nav>