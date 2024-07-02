@extends('front/layout/template')

@section('title', 'Daftar')

@section('content')

<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="text-dark">Login</h4>
            <p>Selamat datang kembali, masukkan kredensial Anda untuk melanjutkan.</p>
          
            <a class="btn btn-dark w-100" href="{{ route('auth.google') }}">
              <img src="{{ asset('images/logo_google.svg') }}" alt="Logo" width="30"> {{ __('Login Dengan Google') }}
            </a>
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
                  <x-input id="email" name="email" type="email" class="" autocomplete="email" />
              </div>
            
          
              <!-- Password -->
              <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <x-input id="password" name="password" type="password" class="" autocomplete="current-password" />
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
            
              <button class="btn btn-primary w-100">{{ __('Log in') }}</button>
              <div class="divider-text my-4">
                <div class="text">
                  Belum punya akun?
                </div>
              </div>
              <a class="btn btn-light w-100" href="{{ route('register') }}">{{ __('Daftar') }}</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  

@endsection