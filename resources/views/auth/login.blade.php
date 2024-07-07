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
              <img src="{{ asset('images/logo_google.svg') }}" alt="Logo" width="30"> Login Dengan Google
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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                @error('email')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                <span class="input-group-text">
                  <i class="bi bi-eye"></i>
                </span>
              </div>
                @error('password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror

                @if (Route::has('password.request'))
                <div class="mt-2">
                  <a class="text-link" href="{{ route('password.request') }}">
                    Lupa password? <span class="text-primary text-underline">Klis disini...</span>
                  </a>
                </div>
                @endif
            </div>
            
              <button class="btn btn-primary w-100">Log in</button>
              <div class="divider-text my-4">
                <div class="text">
                  Belum punya akun?
                </div>
              </div>
              <a class="btn btn-light w-100" href="{{ route('register') }}">Daftar</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@push('js')
    
<script>
  const toggleVisibility = (inputId, eyeIcon) => {
    const inputField = document.getElementById(inputId);
    const iconElement = eyeIcon.querySelector('i');

    eyeIcon.addEventListener('click', () => {
      if (inputField.type === 'password') {
        inputField.type = 'text';
        iconElement.classList.remove('bi-eye');
        iconElement.classList.add('bi-eye-slash');
      } else {
        inputField.type = 'password';
        iconElement.classList.remove('bi-eye-slash');
        iconElement.classList.add('bi-eye');
      }
    });
  };

  const passwordLamaEyeIcon = document.querySelector('#password + .input-group-text');

  toggleVisibility('password', passwordLamaEyeIcon);
</script>

@endpush
  

@endsection