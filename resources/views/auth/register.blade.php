@extends('front/layout/template')

@section('title', 'Daftar')

@section('content')

<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <h4 class="text-dark">Register</h4>
              <p>Silakan masuk jika Anda sudah membuat akun.</p>
              
              <a class="btn btn-dark w-100" href="{{ route('auth.google') }}">
                <img src="{{ asset('images/logo_google.svg') }}" alt="Logo" width="30"> {{ __('Daftar Dengan Google') }}
              </a>
              <div class="divider-text my-4">
                <div class="text">
                  Atau
                </div>
              </div>
          
              <!-- Name -->
              <div class="mb-3">
                <x-input-label for="name" :value="__('Nama')" />
                <x-input id="name" name="name" type="text" class="" autocomplete="username" />
              </div>
          
              <!-- Email Address -->
              <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-input id="email" name="email" type="email" class="" autocomplete="email" />
              </div>
          
              <!-- Password -->
              <div class="mb-3">
                <x-input-label for="password" :value="__('Password')" />
                <x-input id="password" name="password" type="password" class="" autocomplete="new-password" />
              </div>
          
              <!-- Confirm Password -->
              <div class="mb-3">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" name="password_confirmation" type="password" class="" autocomplete="new-password" />
              </div>
              
              <div class="mb-3">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                @error('g-recaptcha-response')
                <div class="invalid-feedback d-block">
                  *{{ $message }}
                </div>
                @enderror
              </div>
              <button class="btn btn-primary w-100">{{ __('Register') }}</button>
              <div class="divider-text my-4">
                <div class="text">
                  Sudah punya akun?
                </div>
              </div>
              <div class="text-center">
                <a class="btn btn-light w-100" href="{{ route('login') }}">
                  {{ __('Log In') }}
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  

@endsection