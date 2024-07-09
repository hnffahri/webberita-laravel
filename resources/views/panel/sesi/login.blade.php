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
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
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
            <!-- Remember Me -->
            {{-- <div class="mb-3">
              <div class="row">
                <div class="col-6">
                  <div class="form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">{{ __('Ingat saja saya') }}</label>
                  </div>
                </div>
              </div>
            </div> --}}
            <button class="btn btn-primary w-100">{{ __('Log in') }}</button>
          </form>

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