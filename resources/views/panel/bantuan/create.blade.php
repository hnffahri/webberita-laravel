@extends('panel/layout/template')

@section('title', 'Tambah Bantuan')

@section('content')

@push('css')
<link href="{{ asset('css/tagin.min.css') }}" rel="stylesheet">
@endpush

<div class="row mb-3 align-items-center">
  <div class="col-7">
    <h1 class="h3 mb-0"><strong>Tambah</strong> Bantuan</h1>
  </div>
  <div class="col-5 text-end">
    <a href="{{ url('panel/bantuan') }}" class="btn btn-primary"><i class="bi bi-chevron-left me-1"></i>Kembali</a>
  </div>
</div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/bantuan" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" class="@error('judul') is-invalid @enderror form-control" value="{{ old('judul') }}">
        @error('judul')
        <div class="invalid-feedback">
          *{{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ringkas">Isi Ringkas</label>
        <textarea name="ringkas" id="ringkas" class="@error('ringkas') is-invalid @enderror form-control">{{ old('ringkas') }}</textarea>
        @error('ringkas')
        <div class="invalid-feedback">
          *{{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="isi">Isi Lengkap</label>
        <textarea name="isi" id="editor" class="@error('isi') is-invalid @enderror">{{ old('isi') }}</textarea>
        @error('isi')
        <div class="invalid-feedback">
          *{{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="keyword">Keyword</label>
        <input name="keyword" id="keyword" class="@error('keyword') is-invalid @enderror form-control tagin" data-tagin-placeholder="Gunakan koma buat nambah keywords" value="{{ old('keyword') }}">
        @error('keyword')
        <div class="invalid-feedback">
          *{{ $message }}
        </div>
        @enderror
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="img">Foto Banner (Opsional)</label>
          <input type="file" name="img" id="img" class="@error('img') is-invalid @enderror form-control">
          @error('img')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-md-6 mb-3">
          <label for="status">Status</label>
          <select name="status" id="status" class="@error('status') is-invalid @enderror form-select">
            {{-- <option value="" hidden>Pilih Status</option> --}}
            <option value="1" @selected(old('status') == '1')>Aktif</option>
            <option value="2" @selected(old('status') == '2')>Tidak Aktif</option>
          </select>
          @error('status')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <button class="btn btn-primary" type="submit"><i class="bi bi-save me-1"></i>Simpan</button>
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
  
  <script src="{{ asset('js/tagin.min.js') }}"></script>
  <script>
    new Tagin(document.querySelector('.tagin'))
  </script>
@endpush