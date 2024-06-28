<x-guest-layout>

  <form method="POST" action="{{ route('register') }}">
    @csrf
    <h5 class="text-dark">Register</h5>
    <p>Silakan masuk jika Anda sudah membuat akun.</p>
    
    <x-link-dark-button href="{{ route('auth.google') }}" class="w-100">
      <img src="{{ asset('images/logo_google.svg') }}" alt="Logo" width="30"> {{ __('Daftar Dengan Google') }}
    </x-link-dark-button>
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

    <x-primary-button class="w-100">{{ __('Register') }}</x-primary-button>
    <div class="divider-text my-4">
      <div class="text">
        Sudah punya akun?
      </div>
    </div>
    <div class="text-center">
      <x-link-outline-light-button href="{{ route('login') }}" class="w-100">
        {{ __('Log In') }}
      </x-link-outline-light-button>
    </div>
  </form>
</x-guest-layout>



{{-- <div>
  <x-input-label for="name" :value="__('Name')" />
  <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
  <x-input :messages="$errors->get('name')" class="mt-2" />
</div>


<div class="mt-4">
  <x-input-label for="email" :value="__('Email')" />
  <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
  <x-input :messages="$errors->get('email')" class="mt-2" />
</div> --}}