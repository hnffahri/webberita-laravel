@extends('panel/layout/template')

@section('title', 'Kebijakan Privasi')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Syarat</strong> ketentuan</h1>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/syarat-ketentuan/{{ $data->id }}">
      @method('PUT')
      @csrf
      <div class="mb-3">
        <label for="syarat_ketentuan">Deskripsi</label>
        <textarea name="syarat_ketentuan" id="editor" class="@error('syarat_ketentuan') is-invalid @enderror">{{ old('syarat_ketentuan', $data->syarat_ketentuan) }}</textarea>
        @error('syarat_ketentuan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
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