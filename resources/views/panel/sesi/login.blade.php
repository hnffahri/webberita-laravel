@extends('panel/layout/templatesesi')

@section('title', 'Login')

@section('content')


<section class="py-5 bg-light">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-5 col-md-6">
        <div class="p-4 bg-white radius-10 shadow-lg">
          <h2 class="text-dark">Masuk Panel</h2>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa libero similique eligendi porro officiis id minus nam.</p>
          
          <form method="POST" action="{{ route('admin.login') }}">
            @csrf
          
            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email">
                @error('email')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                @error('password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror
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
              </div>
            </div>
            <x-primary-button class="w-100">{{ __('Log in') }}</x-primary-button>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

{{-- @push('js')
<script>
  function togglePasswordVisibility() {
      var passwordField = document.getElementById("password");
      var toggleIcon = document.getElementById("toggle-icon");

      if (passwordField.type === "password") {
          passwordField.type = "text";
          toggleIcon.classList.remove("fa-eye");
          toggleIcon.classList.add("fa-eye-slash");
      } else {
          passwordField.type = "password";
          toggleIcon.classList.remove("fa-eye-slash");
          toggleIcon.classList.add("fa-eye");
      }
  }
</script>
@endpush --}}

@endsection