<nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle js-sidebar-toggle">
    <i class="hamburger align-self-center"></i>
  </a>
  <a class="btn btn-primary" target="_blank" href="{{ url('../') }}">Lihat Website</a>

  <div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
          @if (empty(Auth::guard('admin')->user()->avatar))
          <img src="{{ asset('images/user.png') }}" alt="#" class="avatar" width="35">
          @else
          <img src="{{ asset('images/admin/'.Auth::guard('admin')->user()->avatar) }}" class="avatar" width="35" alt="#" />
          @endif
          <span class="text-dark d-none d-sm-inline-block ms-1">{{ Auth::guard('admin')->user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="{{ url('panel/profile') }}"><i class="align-middle bi bi-person me-2"></i>Profile</a>
          <a class="dropdown-item" href="{{ url('panel/password') }}"><i class="align-middle bi bi-lock me-2"></i>Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="align-middle bi bi-box-arrow-left me-2"></i>Log out</a>
          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>