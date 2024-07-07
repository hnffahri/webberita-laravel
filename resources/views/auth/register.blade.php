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
                <img src="{{ asset('images/logo_google.svg') }}" alt="Logo" width="30"> Daftar Dengan Google
              </a>
              <div class="divider-text my-4">
                <div class="text">
                  Atau
                </div>
              </div>
          
              <!-- Name -->
              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="username">
                @error('name')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror
              </div>
          
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
              </div>
          
              <!-- Confirm Password -->
              <div class="mb-3">
                <label for="konfirmasi_password">Konfirmasi Password</label>
                <div class="input-group">
                  <input id="konfirmasi_password" type="password" class="form-control @error('password_konfirmasi') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                  <span class="input-group-text">
                    <i class="bi bi-eye"></i>
                  </span>
                </div>
                @error('password_konfirmasi')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror
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
              <button class="btn btn-primary w-100">Register</button>
              <div class="divider-text my-4">
                <div class="text">
                  Sudah punya akun?
                </div>
              </div>
              <div class="text-center">
                <a class="btn btn-light w-100" href="{{ route('login') }}">
                  Log In
                </a>
              </div>
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
    
      const passwordBaruEyeIcon = document.querySelector('#password + .input-group-text');
      const konfirmasiPasswordEyeIcon = document.querySelector('#konfirmasi_password + .input-group-text');
    
      toggleVisibility('password', passwordBaruEyeIcon);
      toggleVisibility('konfirmasi_password', konfirmasiPasswordEyeIcon);
    </script>
@endpush

@endsection