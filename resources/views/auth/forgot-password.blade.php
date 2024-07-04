@extends('front/layout/template')

@section('title', 'Daftar')

@section('content')

<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="text-dark">Lupa Password</h4>
            <p>Lupa password Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan untuk mereset password yang memungkinkan Anda untuk memilih yang baru.</p>

            <x-auth-session-status class="mb-4" :status="session('status')" />
            
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                <div class="mb-3">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" class="@error('email') is-invalid @enderror form-control" value="{{ old('email') }}">
                  @error('email')
                  <div class="invalid-feedback">
                    *{{ $message }}
                  </div>
                  @enderror
                </div>
                <button class="btn btn-primary w-100">{{ __('Kirim') }}</button>
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