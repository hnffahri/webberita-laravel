<section>
    <header>
        <h5 class="text-dark">
            {{ __('Update Password') }}
        </h5>

        <p class="">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>
    <form method="post" action="{{ route('password.update') }}" class="">
      @csrf
      @method('put')
  
      <div class="mb-3">
          <label for="password_lama">Password Lama</label>
          <div class="input-group">
              <input id="password_lama" type="password" class="form-control @error('current_password','updatePassword') is-invalid @enderror" name="current_password" @error('current_password','updatePassword') autofocus @enderror>
              <span class="input-group-text">
                  <i class="bi bi-eye"></i>
              </span>
          </div>
          @error('current_password','updatePassword')
          <div class="invalid-feedback d-block">
              {{ $message }}
          </div>
          @enderror
      </div>
  
      <div class="mb-3">
          <label for="password_baru">Password Baru</label>
          <div class="input-group">
              <input id="password_baru" type="password" class="form-control @error('new_password','updatePassword') is-invalid @enderror" name="new_password" @error('new_password','updatePassword') autofocus @enderror>
              <span class="input-group-text">
                  <i class="bi bi-eye"></i>
              </span>
          </div>
          @error('new_password','updatePassword')
          <div class="invalid-feedback d-block">
              {{ $message }}
          </div>
          @enderror
      </div>
  
      <div class="mb-3">
          <label for="konfirmasi_password">Konfirmasi Password</label>
          <div class="input-group">
              <input id="konfirmasi_password" type="password" class="form-control @error('new_password_confirmation','updatePassword') is-invalid @enderror" name="new_password_confirmation">
              <span class="input-group-text">
                  <i class="bi bi-eye"></i>
              </span>
          </div>
          @error('new_password_confirmation','updatePassword')
          <div class="invalid-feedback d-block">
              {{ $message }}
          </div>
          @enderror
      </div>
  
      <div class="d-flex align-items-center gap-4">
          <button class="btn btn-primary"><i class="bi bi-save me-2"></i>{{ __('Save') }}</button>
      </div>
  </form>
  
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
  
    const passwordLamaEyeIcon = document.querySelector('#password_lama + .input-group-text');
    const passwordBaruEyeIcon = document.querySelector('#password_baru + .input-group-text');
    const konfirmasiPasswordEyeIcon = document.querySelector('#konfirmasi_password + .input-group-text');
  
    toggleVisibility('password_lama', passwordLamaEyeIcon);
    toggleVisibility('password_baru', passwordBaruEyeIcon);
    toggleVisibility('konfirmasi_password', konfirmasiPasswordEyeIcon);
  </script>
@endpush