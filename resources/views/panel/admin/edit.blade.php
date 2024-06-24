@extends('panel/layout/template')

@section('title', 'Edit admin')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Edit</strong> admin</h1>
  </div>
  <div class="col-6 text-end">
    <a href="{{ url('panel/admin') }}" class="btn btn-primary"><i class="fal fa-chevron-left me-2"></i>Kembali</a>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <h5 class="text-dark fw-semibold mb-3">Profile</h5>
    <form method="POST" action="/panel/admin/{{ $admin->id }}">
      @method('PUT')
      @csrf
      <input type="hidden" name="form_type" value="form_profile">
      <div class="row">
        <div class="mb-3 col-12">
          <label for="name">Nama</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $admin->name) }}">
          @error('name')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 col-md-6">
          <label for="username">Username</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $admin->username) }}">
          @error('username')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 col-md-6">
          <label for="email">Email</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $admin->email) }}">
          @error('email')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <button class="btn btn-primary" type="submit"><i class="fal fa-save me-2"></i>Simpan</button>
    </form>
  </div>
</div>


<div class="card mt-4">
  <div class="card-body">
    <h5 class="text-dark fw-semibold mb-3">Password</h5>
    <form method="POST" action="/panel/admin/{{ $admin->id }}">
      @method('PUT')
      @csrf
      <input type="hidden" name="form_type" value="form_password">
      <div class="row">
        <div class="mb-3 col-md-4">
          <label for="password">Password lama</label>
          <input type="text" class="form-control" id="password" name="password" value="">
        </div>
        <div class="mb-3 col-md-4">
          <label for="password_baru">Password baru</label>
          <input type="text" class="form-control" id="password_baru" name="password_baru" value="">
        </div>
        <div class="mb-3 col-md-4">
          <label for="password_konfirmasi">Konfirmasi password</label>
          <input type="text" class="form-control" id="password_konfirmasi" name="password_konfirmasi" value="">
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
@endpush