@extends('front/layout/template')

@section('title', 'Daftar')

@section('content')

<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="text-dark">Reset Password</h4>
            <p>Reset password anda</p>
            <form method="POST" action="{{ route('password.store') }}">
              @csrf
              <input type="hidden" name="token" value="{{ $request->route('token') }}">
      
              <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" readonly class="@error('email') is-invalid @enderror form-control bg-light" value="{{ $request->email }}">
                @error('email')
                <div class="invalid-feedback">
                  *{{ $message }}
                </div>
                @enderror
              </div>
              
              <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror form-control" autocomplete="new-password">
                @error('password')
                <div class="invalid-feedback">
                  *{{ $message }}
                </div>
                @enderror
              </div>
              
              <div class="mb-3">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="@error('password_confirmation') is-invalid @enderror form-control" autocomplete="new-password">
                @error('password_confirmation')
                <div class="invalid-feedback">
                  *{{ $message }}
                </div>
                @enderror
              </div>
      
              <button class="btn btn-primary w-100">{{ __('Reset Password') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  

@endsection
