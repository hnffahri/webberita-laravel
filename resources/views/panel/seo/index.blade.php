@extends('panel/layout/template')

@section('title', 'Pengaturan SEO')

@section('content')
@push('css')
<link href="{{ asset('css/tagin.min.css') }}" rel="stylesheet">
@endpush

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Pengaturan</strong> SEO</h1>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/seo/{{ $seo->id }}">
      @method('PUT')
      @csrf
      <div class="row">
        <div class="col-12">
          <div class="mb-3">
            <label for="judul">Judul Website</label>
            <input type="text" name="judul" id="judul" class="@error('judul') is-invalid @enderror form-control" value="{{ old('judul', $seo->judul) }}">
            @error('judul')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="keyword">Keyword</label>
            <input name="keyword" id="keyword" class="@error('keyword') is-invalid @enderror form-control tagin" data-tagin-placeholder="Gunakan koma buat nambah keywords" value="{{ old('keyword', $seo->keyword) }}">
            @error('keyword')
            <div class="invalid-feedback">
              *{{ $message }}
            </div>
            @enderror
          </div>
        </div>
      </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="deskripsi">deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="@error('deskripsi') is-invalid @enderror form-control">{{ old('deskripsi', $seo->deskripsi) }}</textarea>
            @error('deskripsi')
            <div class="invalid-feedback">
              {{ $message }}
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
  
  <script src="{{ asset('js/tagin.min.js') }}"></script>
  <script>
    new Tagin(document.querySelector('.tagin'))
  </script>
@endpush