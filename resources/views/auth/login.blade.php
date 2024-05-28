<x-guest-layout>

  <h5 class="text-dark">Login</h5>
  <p>Selamat datang kembali, masukkan kredensial Anda untuk melanjutkan.</p>

  <x-link-dark-button href="{{ route('register') }}" class="w-100">
    <img src="{{ asset('images/logo_google.svg') }}" alt="Logo" width="30"> {{ __('Login Dengan Google') }}
  </x-link-dark-button>
  <div class="divider-text my-4">
    <div class="text">
      Atau
    </div>
  </div>
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}">
    @csrf
  
    <!-- Email Address -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <x-input id="email" name="email" type="email" autocomplete="email" />
    </div>
  

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <x-input id="password" name="password" type="password" autocomplete="current-password" />
    </div>
  
    <!-- Remember Me -->
    <div class="mb-3">
      <div class="row">
        <div class="col-6">
          <div class="form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">{{ __('Ingat saja saya') }}</label>
          </div>
        </div>
        <div class="col-6 text-end">
          @if (Route::has('password.request'))
            <a class="text-link" href="{{ route('password.request') }}">
              {{ __('Lupa password?') }}
            </a>
          @endif
        </div>
      </div>
    </div>
  
    <x-primary-button class="w-100">{{ __('Log in') }}</x-primary-button>
    <div class="divider-text my-4">
      <div class="text">
        Belum punya akun?
      </div>
    </div>
    <div class="text-center">
      <x-link-outline-light-button href="{{ route('register') }}" class="w-100">
        {{ __('Daftar') }}
      </x-link-outline-light-button>
    </div>
  </form>
</x-guest-layout>
