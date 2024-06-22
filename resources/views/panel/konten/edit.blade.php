@extends('panel/layout/template')

@section('title', 'Edit Konten')

@section('content')

@push('css')
<link href="{{ asset('css/tagin.min.css') }}" rel="stylesheet">
@endpush

<div class="row mb-3 align-items-center">
  <div class="col-7">
    <h1 class="h3 mb-0"><strong>Edit</strong> Konten</h1>
  </div>
  <div class="col-5 text-end">
    <a href="{{ url('panel/konten') }}" class="btn btn-primary"><i class="fal fa-chevron-left me-2"></i>Kembali</a>
  </div>
</div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/konten/{{ $konten->id }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf

      <input type="text" hidden name="oldvidio" id="oldvidio" class="form-control" value="{{ $konten->vidio }}">
      <input type="text" hidden name="oldimg" id="oldimg" class="form-control" value="{{ $konten->img }}">
      <input type="text" hidden name="type" id="type" class="form-control" value="{{ $konten->type }}">

      <div class="row">
        <div class="col-md-3 col-6 mb-3">
          <label for="type">Type</label>
          <select name="type" disabled id="type" class="@error('type') is-invalid @enderror form-select" onchange="showDiv(this)">
            <option value="" hidden>Pilih Type</option>
            <option value="1" @selected(old('type', $konten->type) == '1')>Artikel</option>
            <option value="2" @selected(old('type', $konten->type) == '2')>Vidio</option>
          </select>
          @error('type')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-md-3 col-6 mb-3">
          <label for="status">Status</label>
          <select name="status" id="status" class="@error('status') is-invalid @enderror form-select">
            <option value="" hidden>Pilih Status</option>
            <option value="1" @selected(old('status', $konten->status) == '1')>Aktif</option>
            <option value="2" @selected(old('status', $konten->status) == '2')>Tidak Aktif</option>
          </select>
          @error('status')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-md-6 mb-3">
          <label for="kategori">Kategori</label>
          <select name="kategori_id" id="kategori" class="@error('kategori_id') is-invalid @enderror form-select">
            <option value="" hidden>Pilih Kategori</option>
            @foreach ($kategori as $item)
              <option value="{{ $item->id }}" {{ old('kategori_id', $konten->kategori_id) == $item->id ? 'selected' : null }}>{{ $item->nama }}</option>
            @endforeach
          </select>
          @error('kategori_id')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>
      </div>
      
      <div class="mb-3">
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" class="@error('judul') is-invalid @enderror form-control" value="{{ old('judul', $konten->judul ?? '') }}">
        @error('judul')
        <div class="invalid-feedback">
          *{{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ringkas">Isi Ringkas</label>
        <textarea name="ringkas" id="ringkas" class="@error('ringkas') is-invalid @enderror form-control">{{ old('ringkas', $konten->ringkas ?? '') }}</textarea>
        @error('ringkas')
        <div class="invalid-feedback">
          *{{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="isi">Isi Lengkap</label>
        <textarea name="isi" id="editor" class="@error('isi') is-invalid @enderror">{{ old('isi', $konten->isi ?? '') }}</textarea>
        @error('isi')
        <div class="invalid-feedback">
          *{{ $message }}
        </div>
        @enderror
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="img">Foto Banner</label>
          <input type="file" name="img" id="img" class="@error('img') is-invalid @enderror form-control">
          @error('img')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-md-6 mb-3">
          <label for="vidio">Vidio</label>
          <input type="file" name="vidio" id="vidio" class="@error('vidio') is-invalid @enderror form-control">
          @error('vidio')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3">
        <label for="keyword">Keyword</label>
        <input name="keyword" id="keyword" class="@error('keyword') is-invalid @enderror form-control tagin" data-tagin-placeholder="Gunakan koma buat nambah keywords" value="{{ old('keyword', $konten->keyword ?? '') }}">
        @error('keyword')
        <div class="invalid-feedback">
          *{{ $message }}
        </div>
        @enderror
      </div>
      <button class="btn btn-primary" type="submit"><i class="fal fa-save me-2"></i>Simpan</button>
    </form>
  </div>
</div>

@endsection

@push('js')
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <script>
    // Initialize CKEditor
    CKEDITOR.replace('editor', {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    });
  </script>

  <!-- Include the Quill library -->
  <script src="{{ asset('js/tagin.min.js') }}"></script>

  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      showDiv(document.getElementById('type'));
    });
  
    function showDiv(select) {
      var vidioInput = document.getElementById('vidio');
      if (select.value === '' || select.value === '1') {
        vidioInput.disabled = true;
      } else {
        vidioInput.disabled = false;
      }
    }
  </script>
  
  <script>
    new Tagin(document.querySelector('.tagin'))
  </script>
@endpush