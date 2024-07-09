@extends('panel/layout/template')

@section('title', 'Edit Kategori')

@section('content')


<div class="row mb-3 align-items-center">
  <div class="col-7">
    <h1 class="h3 mb-0"><strong>Edit</strong> kategori</h1>
  </div>
  <div class="col-5 text-end">
    <a href="{{ url('panel/kategori') }}" class="btn btn-primary"><i class="bi bi-chevron-left me-1"></i>Kembali</a>
  </div>
</div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/kategori/{{ $kategori->id }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="row">
        <div class="col-md-3 col-6 mb-3">
          <label for="nama">Nama Kategori</label>
          <input type="text" name="nama" id="nama" class="@error('nama') is-invalid @enderror form-control" value="{{ old('nama', $kategori->nama) }}">
          @error('nama')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-md-3 col-6 mb-3">
          <label for="warna">Warna</label>
          <input type="color" name="warna" id="warna" class="@error('warna') is-invalid @enderror form-control form-control-color" value="{{ old('warna', $kategori->warna) }}">
          @error('warna')
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