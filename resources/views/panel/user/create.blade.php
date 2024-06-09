@extends('panel/layout/template')

@section('title', 'User · Panel')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Tambah</strong> Admin</h1>
  </div>
  <div class="col-6 text-end">
    <a href="{{ url('panel/user') }}" class="btn btn-primary"><i class="fal fa-chevron-left me-2"></i>Kembali</a>
  </div>
</div>

@include('panel/komponen/alert')

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/user">
      @csrf
      <div class="mb-3">
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
      </div>
      <div class="row">
        <div class="mb-3 col-md-6">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
        </div>
        <div class="mb-3 col-md-6">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
      </div>
      <div class="row">
        <div class="mb-3 col-md-6">
          <label for="password">Password</label>
          <div class="input-group">
            <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
            <span class="input-group-text" id="toggle-password">
              <i class="fal fa-eye" id="toggle-icon" onclick="togglePasswordVisibility()"></i>
            </span>
          </div>
        </div>
        <div class="mb-3 col-md-6">
          <label for="password-confirm">Konfirmasi Password</label>
          <div class="input-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            <span class="input-group-text" id="toggle-password-confirm">
              <i class="fal fa-eye" id="toggle-icon-confirm" onclick="togglePasswordConfirmVisibility()"></i>
            </span>
          </div>
        </div>
      </div>
      <button class="btn btn-primary"><i class="fal fa-save me-2"></i>Simpan</button>
    </form>
  </div>
</div>

@push('js')
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

  function togglePasswordConfirmVisibility() {
      var passwordConfirmField = document.getElementById("password-confirm");
      var toggleIconConfirm = document.getElementById("toggle-icon-confirm");

      if (passwordConfirmField.type === "password") {
          passwordConfirmField.type = "text";
          toggleIconConfirm.classList.remove("fa-eye");
          toggleIconConfirm.classList.add("fa-eye-slash");
      } else {
          passwordConfirmField.type = "password";
          toggleIconConfirm.classList.remove("fa-eye-slash");
          toggleIconConfirm.classList.add("fa-eye");
      }
  }
</script>
@endpush

@endsection