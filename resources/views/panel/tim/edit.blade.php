@extends('panel/layout/template')

@section('title', 'Tambah Tim')

@section('content')

@push('css')
<link href="{{ asset('css/tagin.min.css') }}" rel="stylesheet">
@endpush

<div class="row mb-3 align-items-center">
  <div class="col-7">
    <h1 class="h3 mb-0"><strong>Tambah</strong> Tim</h1>
  </div>
  <div class="col-5 text-end">
    <a href="{{ url('panel/tim') }}" class="btn btn-primary"><i class="bi bi-chevron-left me-1"></i>Kembali</a>
  </div>
</div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/tim/{{ $tim->id }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="row">
        <div class="col-12 mb-3">
          <label for="avatar" class="label-avatar d-flex align-items-center">
            @if (empty($tim->avatar))
            <img src="{{ asset('images/user.png') }}" alt="avatar" id="imgavatar" width="50" class="rounded-3 border me-3 kotak">
            @else
            <img src="{{ asset('images/tim/'.$tim->avatar) }}" alt="avatar" id="imgavatar" width="50" class="rounded-3 border me-3 kotak">
            @endif
            <div class="">
              <small>Avatar</small>
              <h5 class="text-dark m-0 fw-semibold"><i class="bi bi-pencil-square me-1"></i>Pilih Foto</h5>
            </div>
          </label>
          <input type="file" class="form-control" id="avatar" name="avatar" hidden>
          <input type="text" hidden name="oldavatar" id="oldavatar" class="form-control" value="{{ $tim->avatar }}">
          @error('avatar')
          <div class="invalid-feedback d-block">
            *{{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="@error('nama') is-invalid @enderror form-control" value="{{ old('nama', $tim->nama ?? '') }}">
            @error('nama')
            <div class="invalid-feedback">
              *{{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="posisi">Posisi</label>
            <input type="text" name="posisi" id="posisi" class="@error('posisi') is-invalid @enderror form-control" value="{{ old('posisi', $tim->posisi ?? '') }}">
            @error('posisi')
            <div class="invalid-feedback">
              *{{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="facebook">Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook', $tim->facebook ?? '') }}">
            @error('facebook')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="xtwitter">Twitter</label>
            <input type="text" name="xtwitter" id="xtwitter" class="form-control @error('xtwitter') is-invalid @enderror" value="{{ old('xtwitter', $tim->xtwitter ?? '') }}">
            @error('xtwitter')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="instagram">Instagram</label>
            <input type="text" name="instagram" id="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ old('instagram', $tim->instagram ?? '') }}">
            @error('instagram')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="youtube">Youtube</label>
            <input type="text" name="youtube" id="youtube" class="form-control @error('youtube') is-invalid @enderror" value="{{ old('youtube', $tim->youtube ?? '') }}">
            @error('youtube')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
      </div>
      <button class="btn btn-primary" type="submit"><i class="bi bi-save me-1"></i>Simpan</button>
    </form>
  </div>
</div>

@endsection

@push('js')
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