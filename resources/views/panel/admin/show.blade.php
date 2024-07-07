@extends('panel/layout/template')

@section('title', 'Admin admin')

@section('content')

<div class="row align-items-center mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>User</strong> Admin</h1>
  </div>
  <div class="col-6 text-end">
    <a href="{{ url('panel/admin') }}" class="btn btn-primary"><i class="fal fa-chevron-left me-2"></i>Kembali</a>
  </div>
</div>

<div class="row">
  <div class="col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          @if (empty($admin->avatar))
          <img src="{{ asset('images/user.png') }}" alt="#" class="rounded-circle kotak" width="60">
          @else
          <img src="{{ asset('images/admin/'.$admin->avatar) }}" alt="#" class="rounded-circle kotak" width="60">
          @endif
          <div class="ms-3">
            <h5 class="text-dark fw-bold mb-1">{{ $admin->name }}</h5>
            <div><i class="fal fa-archive me-2"></i>{{ $admin->konten_count }} konten</div>
          </div>
        </div>
        <hr>
        <h5 class="fw-bold text-dark">Sosial :</h5>
        <a class="mt-2 me-2 me-lg-0 d-lg-block text-dark" href="{{ $admin->facebook }}"><i class="icon fab fa-facebook-f"></i><span class="d-none d-lg-inline-block ms-2">{{ $admin->facebook }}</span></a>
        <a class="mt-2 me-2 me-lg-0 d-lg-block text-dark" href="{{ $admin->xtwitter }}"><i class="icon fab fa-twitter"></i><span class="d-none d-lg-inline-block ms-2">{{ $admin->xtwitter }}</span></a>
        <a class="mt-2 me-2 me-lg-0 d-lg-block text-dark" href="{{ $admin->instagram }}"><i class="icon fab fa-instagram"></i><span class="d-none d-lg-inline-block ms-2">{{ $admin->instagram }}</span></a>
        <a class="mt-2 me-2 me-lg-0 d-lg-block text-dark" href="{{ $admin->youtube }}"><i class="icon fab fa-youtube"></i><span class="d-none d-lg-inline-block ms-2">{{ $admin->youtube }}</span></a>
      </div>
    </div>
  </div>
  <div class="col-xl-9">
    <h5 class="text-dark fw-bold">Biography</h5>
    <p>{{ $admin->biografi }}</p>
    <table class="table my-0">
      <tbody>
        <tr>
          <th width="115">Email</th>
          <th width="10">:</th>
          <th>{{ $admin->email }}</th>
        </tr>
        <tr>
          <th width="115">Tanggal lahir</th>
          <th width="10">:</th>
          <th>{{ $admin->tanggal_lahir }}</th>
        </tr>
        <tr>
          <th width="115">Whatsapp</th>
          <th width="10">:</th>
          <th>{{ $admin->whatsapp }}</th>
        </tr>
        <tr>
          <th width="115">Alamat</th>
          <th width="10">:</th>
          <th>{{ $admin->alamat }}</th>
        </tr>
        <tr>
          <th width="115">Provinsi</th>
          <th width="10">:</th>
          <th>{{ $admin->province->name }}</th>
        </tr>
        <tr>
          <th width="115">Kota</th>
          <th width="10">:</th>
          <th>{{ $admin->city->name }}</th>
        </tr>
        <tr>
          <th width="115">Dibuat</th>
          <th width="10">:</th>
          <th>{{ $admin->created_at }}</th>
        </tr>
        <tr>
          <th width="115">Update</th>
          <th width="10">:</th>
          <th>{{ $admin->updated_at }}</th>
        </tr>
      </tbody>
    </table>
  </div>
</div>

@endsection