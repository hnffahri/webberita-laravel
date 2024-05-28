<x-guest-layout>
    
  <h5 class="text-dark">Lupa password</h5>
  <p>Lupa password Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan untuk mereset password yang memungkinkan Anda untuk memilih yang baru.</p>

  <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-input id="email" name="email" type="email" autocomplete="email" />
        </div>
        <x-primary-button class="w-100">{{ __('Email Password Reset Link') }}</x-primary-button>
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
