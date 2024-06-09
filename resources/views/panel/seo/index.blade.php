@extends('panel/layout/template')

@section('title', 'Pengaturan SEO')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Pengaturan</strong> SEO</h1>
  </div>
</div>

@include('panel/komponen/alert')
<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/seo/{{ $seo->id }}">
      @method('PUT')
      @csrf
      <div class="row">
        <div class="col-12">
          <div class="mb-3">
            <label for="judul">judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $seo->judul }}">
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="keyword">keyword</label>
            <input type="text" name="keyword" id="keyword" class="form-control" value="{{ $seo->keyword }}">
          </div>
        </div>
      </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="deskripsi">deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $seo->deskripsi }}</textarea>
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