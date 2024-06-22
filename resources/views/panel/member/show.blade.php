@extends('panel/layout/template')

@section('title', 'Admin User')

@section('content')

<div class="row align-items-center mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Detail</strong> User Admin</h1>
  </div>
  <div class="col-6 text-end">
    <a href="{{ url('panel/user') }}" class="btn btn-primary"><i class="fal fa-chevron-left me-2"></i>Kembali</a>
  </div>
</div>

<div class="row">
  <div class="col-lg-3">
    <div class="card text-center">
      <div class="card-body">
        <div class="mb-3">
          @if (empty($item->avatar))
          <img src="{{ asset('images/user.png') }}" alt="#" class="kotak rounded-circle me-2 border" width="90">
          @else
          <img src="{{ asset('images/user/'.$item->avatar) }}" alt="#" class="kotak rounded-circle me-2 border" width="90">
          @endif
        </div>
        <h5 class="text-dark fw-bold m-0">{{ $user->name }}</h5>
        <span>{{ $user->username }}</span>
        <div class="mt-3">
          <a href="#" class="btn btn-danger btn-sm"><i class="fal fa-trash-alt me-2"></i>Hapus Akun</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-9">
    <h5 class="text-dark fw-bold">Biography</h5>
    <p>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe fugiat qui, repudiandae suscipit quibusdam maiores eaque placeat consequatur beatae ut ex harum perferendis atque. Et iusto sapiente ullam molestias ea.
    </p>
    <table class="table my-0">
      <tbody>
        <tr>
          <th width="115">Email</th>
          <th width="10">:</th>
          <th>{{ $user->email }}</th>
        </tr>
        <tr>
          <th width="115">Tanggal lahir</th>
          <th width="10">:</th>
          <th>{{ $user->tanggal_lahir }}</th>
        </tr>
        <tr>
          <th width="115">Whatsapp</th>
          <th width="10">:</th>
          <th>{{ $user->whatsapp }}</th>
        </tr>
        <tr>
          <th width="115">Alamat</th>
          <th width="10">:</th>
          <th>{{ $user->alamat }}</th>
        </tr>
        <tr>
          <th width="115">Provinsi</th>
          <th width="10">:</th>
          <th>{{ $user->provinsi }}</th>
        </tr>
        <tr>
          <th width="115">Kota</th>
          <th width="10">:</th>
          <th>{{ $user->kota }}</th>
        </tr>
        <tr>
          <th width="115">Dibuat</th>
          <th width="10">:</th>
          <th>{{ $user->created_at }}</th>
        </tr>
        <tr>
          <th width="115">Update</th>
          <th width="10">:</th>
          <th>{{ $user->updated_at }}</th>
        </tr>
      </tbody>
    </table>
  </div>
</div>

@endsection