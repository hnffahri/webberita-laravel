@extends('panel/layout/template')

@section('title', 'Profile')

@section('content')

@push('css')
<link href="{{ asset('css/quill.min.css') }}" rel="stylesheet" />
@endpush

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Setting</strong> Profile</h1>
  </div>
</div>

{{-- @include('panel/komponen/alert') --}}
<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/profile/{{ $data->id }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="mb-4">
        <label for="avatar" class="label-avatar d-flex align-items-center">
          @if (empty($data->avatar))
          <img src="{{ asset('images/user.png') }}" alt="avatar" id="imgavatar" width="40" class="rounded-3 border me-3 kotak"><h5 class="text-dark m-0 fw-semibold"><i class="far fa-edit me-2"></i>Ganti Avatar</h5>
          @else
          <img src="{{ asset('images/admin/'.$data->avatar) }}" alt="avatar" id="imgavatar" width="40" class="rounded-3 border me-3 kotak"><h5 class="text-dark m-0 fw-semibold"><i class="far fa-edit me-2"></i>Ganti Avatar</h5>
          @endif
        </label>
        <input type="file" class="form-control" id="avatar" name="avatar" hidden>
        <input type="text" class="form-control" id="oldavatar" hidden name="oldavatar" value="{{ $data->avatar }}">
      </div>
      <div class="row">

        <div class="mb-3 col-md-6">
          <label for="name">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $data->name) }}">
          @error('name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 col-md-6">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ $data->email }}" disabled>
        </div>
        <div class="mb-3 col-12">
          <label for="biografi">Biografi</label>
          <textarea class="form-control @error('biografi') is-invalid @enderror" id="biografi" name="biografi">{{ old('biografi', $data->biografi) }}</textarea>
          @error('biografi')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 col-md-6">
          <label for="provinsi">Provinsi</label>
          <select name="provinsi" id="provinsi" class="form-select @error('provinsi') is-invalid @enderror">
            {{-- <option value="" hidden>Pilih Provinsi</option> --}}
            <option value="1">Jawa Barat</option>
          </select>
          @error('provinsi')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 col-md-6">
          <label for="kota">Kota</label>
          <select name="kota" id="kota" class="form-select @error('kota') is-invalid @enderror">
            {{-- <option value="" hidden>Pilih Kota</option> --}}
            <option value="1">Bandung</option>
          </select>
          @error('kota')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 col-12">
          <label for="alamat">Alamat</label>
          <textarea class="form-control  @error('kota') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat', $data->alamat) }}</textarea>
          @error('alamat')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
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
  var avatar = document.getElementById("avatar");

  avatar.onchange = function(evt) {
    const [file] = avatar.files
    if (file) {
      imgavatar.src = URL.createObjectURL(file)
    }
  };
  </script>
@endpush