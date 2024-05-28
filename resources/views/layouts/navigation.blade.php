<nav class="navbar navbar-expand-lg border-bottom bg-white">
  <div class="container-fluid">
    <a class="navbar-brand logo" href="{{ route('dashboard') }}">
      LaravelBreeze_
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav ms-auto align-items-center">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
          {{ __('Profile') }}
        </x-nav-link>
        {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          {{ __('Dashboard') }}
        </x-nav-link> --}}
        <div class="dropdown nav-link">
          <a class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{-- {{ Auth::user()->name }} --}}
            <img src="{{ asset('images/user.jpg') }}" alt="#" class="bulat" width="30">
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow-sm">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</a></li>
            </form>
            
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>