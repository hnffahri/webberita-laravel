@extends('panel/layout/template')

@section('title', 'Password')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Setting</strong> Password</h1>
  </div>
</div>

{{-- @include('panel/komponen/alert') --}}
<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/password/{{ Auth::guard('admin')->user()->id }}">
      @method('PUT')
      @csrf
      <div class="row">
        <div class="col-12 mb-3">
          <label for="password_lama">Password Lama</label>
          <div class="input-group">
            <input id="password_lama" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
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
        <div class="col-12 mb-3">
          <label for="password_baru">Password Baru</label>
          <div class="input-group">
            <input id="password_baru" type="password" class="form-control @error('password_baru') is-invalid @enderror" name="password_baru" autocomplete="new-password">
            <span class="input-group-text">
              <i class="bi bi-eye"></i>
            </span>
          </div>
          @error('password_baru')
          <div class="invalid-feedback d-block">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-12 mb-3">
          <label for="konfirmasi_password">Konfirmasi Password</label>
          <div class="input-group">
            <input id="konfirmasi_password" type="password" class="form-control @error('password_konfirmasi') is-invalid @enderror" name="password_konfirmasi" autocomplete="new-password">
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
      </div>
      <button class="btn btn-primary" type="submit"><i class="bi bi-save me-2"></i>Simpan</button>
    </form>
  </div>
</div>

@endsection

@push('js')
{{-- alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Alert
  const swal = $('.swal').data('swal');
  if(swal){
    Swal.fire({
      title: "Berhasil...",
      text: swal,
      icon: "success",
      showConfirmButton: false,
      timer: 2500
    });
  }
</script>

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