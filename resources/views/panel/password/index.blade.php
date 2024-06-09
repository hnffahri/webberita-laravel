@extends('panel/layout/template')

@section('title', 'Password')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Setting</strong> Password</h1>
  </div>
</div>

@include('panel/komponen/alert')
<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/password/{{ Auth::user()->id }}">
      @method('PUT')
      @csrf
      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="password_lama">Password Lama</label>
          <div class="input-group">
            <input id="password_lama" type="password" class="form-control" name="password" autocomplete="new-password">
            <span class="input-group-text">
              <i class="fal fa-eye"></i>
            </span>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="password_baru">Password Baru</label>
          <div class="input-group">
            <input id="password_baru" type="password" class="form-control" name="password_baru" autocomplete="new-password">
            <span class="input-group-text">
              <i class="fal fa-eye"></i>
            </span>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="konfirmasi_password">Konfirmasi Password</label>
          <div class="input-group">
            <input id="konfirmasi_password" type="password" class="form-control" name="password_konfirmasi" autocomplete="new-password">
            <span class="input-group-text">
              <i class="fal fa-eye"></i>
            </span>
          </div>
        </div>
      </div>
      <button class="btn btn-primary" type="submit"><i class="fal fa-save me-2"></i>Simpan</button>
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
        iconElement.classList.remove('fa-eye');
        iconElement.classList.add('fa-eye-slash');
      } else {
        inputField.type = 'password';
        iconElement.classList.remove('fa-eye-slash');
        iconElement.classList.add('fa-eye');
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