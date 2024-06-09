@extends('panel/layout/template')

@section('title', 'Edit User')

@section('content')

@push('css')
<link href="{{ asset('css/quill.min.css') }}" rel="stylesheet" />
<link href="{{ asset('css/tagin.min.css') }}" rel="stylesheet">
@endpush

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Edit</strong> User</h1>
  </div>
  <div class="col-6 text-end">
    <a href="{{ url('panel/user') }}" class="btn btn-primary"><i class="fal fa-chevron-left me-2"></i>Kembali</a>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

@include('panel/komponen/alert')
<div class="card flex-fill">
  <div class="card-body">
    <h5 class="text-dark fw-semibold mb-3">Profile</h5>
    <form method="POST" action="/panel/user/{{ $user->id }}">
      @method('PUT')
      @csrf
      <input type="hidden" name="form_type" value="form_profile">
      <div class="row">
        <div class="mb-3 col-md-6">
          <label for="name">Nama</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="mb-3 col-md-6">
          <label for="whatsapp">Whatsapp</label>
          <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $user->whatsapp }}">
        </div>
        <div class="mb-3 col-md-6">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
        </div>
        <div class="mb-3 col-md-6">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
      </div>
      <button class="btn btn-primary" type="submit"><i class="fal fa-save me-2"></i>Simpan</button>
    </form>
  </div>
</div>

<div class="card mt-4">
  <div class="card-body">
    <h5 class="text-dark fw-semibold mb-3">Password</h5>
    <form method="POST" action="/panel/user/{{ $user->id }}" enctype="multipart/form-data">
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