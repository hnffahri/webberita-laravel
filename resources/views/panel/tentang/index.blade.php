@extends('panel/layout/template')

@section('title', 'Tentang Kami')

@section('content')

@push('css')
<link href="{{ asset('css/quill.min.css') }}" rel="stylesheet" />
@endpush

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Tentang</strong> Kami</h1>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/tentang/{{ $data->id }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <input type="text" class="form-control" hidden id="oldlogo" value="{{ old('logo', $data->logo) }}" name="oldlogo">
      <div class="mb-3">
        <label for="logo">Logo</label>
        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="imglogo" name="logo">
      </div>
      @error('logo')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
      <div class="mb-3">
        <label for="logo">Preview</label>
        <div>
          <img src="{{ asset('images/'.$data->logo) }}" alt="logo" height="80" class="p-2 border">
        </div>
      </div>
      <hr>
      <div class="mb-3">
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $data->judul) }}">
        @error('judul')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tentang_kami">Tentang Kami</label>
        <textarea name="tentang_kami" id="editor_tentang_kami" class="@error('tentang_kami') is-invalid @enderror">{{ old('tentang_kami', $data->tentang_kami) }}</textarea>
        @error('tentang_kami')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <input type="text" class="form-control" hidden id="oldimg" value="{{ old('img', $data->img) }}" name="oldimg">
      <div class="mb-3">
        <label for="img">Foto (Banner)</label>
        <input type="file" class="form-control @error('img') is-invalid @enderror" id="imgimg" name="img">
      </div>
      @error('img')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
      <div class="mb-3">
        <label for="img">Preview</label>
        <div>
          <img src="{{ asset('images/'.$data->img) }}" id="img" alt="img" height="200" class="p-2 border banner">
        </div>
      </div>
      <div class="mb-3">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $data->alamat) }}</textarea>
        @error('alamat')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="telephone">Telephone</label>
        <input type="text" name="telephone" id="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone', $data->telephone) }}">
        @error('telephone')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email">Email</label>
        <input type="mail" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $data->email) }}">
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="gmap">Gmaps (Latitude dan longtitude)</label>
        <input type="text" name="gmap" id="gmap" class="form-control @error('gmap') is-invalid @enderror" value="{{ old('gmap', $data->gmap) }}">
        @error('gmap')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <hr>
      <div class="mb-3">
        <label for="visi">Visi</label>
        <textarea name="visi" id="editor_visi" class="@error('visi') is-invalid @enderror">{{ old('visi', $data->visi) }}</textarea>
        @error('visi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <input type="text" class="form-control" hidden id="oldimgvisi" value="{{ old('imgvisi', $data->imgvisi) }}" name="oldimgvisi">
      <div class="mb-3">
        <label for="imgvisi">Foto (Visi)</label>
        <input type="file" class="form-control @error('imgvisi') is-invalid @enderror" id="imgimgvisi" name="imgvisi">
      </div>
      @error('imgvisi')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
      <div class="mb-3">
        <label for="imgvisi">Preview</label>
        <div>
          <img src="{{ asset('images/'.$data->imgvisi) }}" id="imgvisi" alt="imgvisi" height="200" class="p-2 border kotak">
        </div>
      </div>
      <div class="mb-3">
        <label for="misi">Misi</label>
        <textarea name="misi" id="editor_misi" class="@error('misi') is-invalid @enderror">{{ old('misi', $data->misi) }}</textarea>
        @error('misi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <input type="text" class="form-control" hidden id="oldimgmisi" value="{{ old('imgmisi', $data->imgmisi) }}" name="oldimgmisi">
      <div class="mb-3">
        <label for="imgmisi">Foto (Misi)</label>
        <input type="file" class="form-control @error('imgmisi') is-invalid @enderror" id="imgimgmisi" name="imgmisi">
      </div>
      @error('imgmisi')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
      <div class="mb-3">
        <label for="imgmisi">Preview</label>
        <div>
          <img src="{{ asset('images/'.$data->imgmisi) }}" id="imgmisi" alt="imgmisi" height="200" class="p-2 border kotak">
        </div>
      </div>
      <button class="btn btn-primary" type="submit"><i class="bi bi-save me-1"></i>Simpan</button>
    </form>
  </div>
</div>

@endsection

@push('js')
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script><script>
    // Initialize CKEditor untuk tentang_kami
    CKEDITOR.replace('editor_tentang_kami', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    });

    // Initialize CKEditor untuk visi
    CKEDITOR.replace('editor_visi', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    });

    // Initialize CKEditor untuk misi
    CKEDITOR.replace('editor_misi', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    });
  </script>

  {{-- Preview logo --}}
  <script>
    var logo = document.getElementById("logo");
    logo.onchange = function(evt) {
      const [file] = logo.files
      if (file) {
        imglogo.src = URL.createObjectURL(file)
      }
    };
    
    var imgvisi = document.getElementById("imgvisi");
    imgvisi.onchange = function(evt) {
      const [file] = imgvisi.files
      if (file) {
        imgimgvisi.src = URL.createObjectURL(file)
      }
    };
    
    var imgmisi = document.getElementById("imgmisi");
    imgmisi.onchange = function(evt) {
      const [file] = imgmisi.files
      if (file) {
        imgimgmisi.src = URL.createObjectURL(file)
      }
    };
    
    var img = document.getElementById("img");
    img.onchange = function(evt) {
      const [file] = img.files
      if (file) {
        imgimg.src = URL.createObjectURL(file)
      }
    };
  </script>

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