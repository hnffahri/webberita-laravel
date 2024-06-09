@extends('panel/layout/template')

@section('title', 'Edit Konten')

@section('content')

@push('css')
<link href="{{ asset('css/quill.min.css') }}" rel="stylesheet" />
<link href="{{ asset('css/tagin.min.css') }}" rel="stylesheet">
@endpush

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0">Tambah Konten</h1>
  </div>
  <div class="col-6 text-end">
    <a href="{{ url('panel/konten') }}" class="btn btn-primary"><i class="fal fa-chevron-left me-2"></i>Kembali</a>
  </div>
</div>

@include('panel/komponen/alert')
<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/konten/{{ $konten->id }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="row">
        <input type="text" hidden name="oldvidio" id="oldvidio" class="form-control" value="{{ $konten->vidio }}">
        <input type="text" hidden name="oldimg" id="oldimg" class="form-control" value="{{ $konten->img }}">
        <input type="text" hidden name="type" id="type" class="form-control" value="{{ $konten->type }}">
        <div class="col-md-3 col-6 mb-3">
          <label for="type">Type</label>
          <select id="type" disabled class="form-select" onchange="showDiv(this)">
            <option>{{ $konten->type == 2 ? 'Vidio' : 'Artikel' }}</option>
          </select>
        </div>
        <div class="col-md-3 col-6 mb-3">
          <label for="status">Status</label>
          <select name="status" id="status" class="form-select">
            <option value="" hidden>Pilih Status</option>
            <option value="1" {{ $konten->status == 1 ? 'selected' : null }}>Aktif</option>
            <option value="0" {{ $konten->status == 0 ? 'selected' : null }}>Tidak Aktif</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="kategori">Kategori</label>
          <select name="kategori_id" id="kategori" class="form-select">
            <option value="" hidden>Pilih Kategori</option>
            @foreach ($kategori as $item)
            @if ($item->id == $konten->kategori_id)
            <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
            @else
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endif
            @endforeach
          </select>
        </div>
      </div>
      <div class="mb-3">
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control" value="{{ $konten->judul }}">
      </div>
      <div class="mb-3">
        <label for="ringkas">Isi Ringkas</label>
        <textarea name="ringkas" id="ringkas" class="form-control">{{ $konten->ringkas }}</textarea>
      </div>
      <div class="mb-3">
        <label for="isi">Isi Lengkap</label>
        <textarea hidden name="isi">{{ $konten->isi }}</textarea>
        <div id="editor">
          {!! $konten->isi !!}
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="img">Foto Banner</label>
          <input type="file" name="img" id="img" class="form-control">
          <img src="{{ asset('images/konten/'.$konten->img) }}" alt="{{ $konten->judul }}" class="banner rounded w-100 border mt-2">
        </div>
        <div class="col-md-6 mb-3">
          <label for="vidio">Vidio</label>
          <input type="file" name="vidio" id="vidio" class="form-control">
          @if ($konten->type == 2)
          <video class="vidio-detail mt-2" controls>
            <source src="{{ asset('vidio/konten/'.$konten->vidio) }}" type="video/mp4">
          </video>
          @endif
        </div>
      </div>
      <div class="mb-3">
        <label for="keyword">Keyword</label>
        <input name="keyword" id="keyword" class="form-control tagin" data-tagin-placeholder="Gunakan koma buat nambah keywords" value="{{ $konten->keyword }}">
      </div>
      <button class="btn btn-primary" type="submit"><i class="fal fa-save me-2"></i>Simpan</button>
    </form>
  </div>
</div>

@endsection

@push('js')
  <!-- Include the Quill library -->
  <script src="{{ asset('js/quill.min.js') }}"></script>
  <script src="{{ asset('js/tagin.min.js') }}"></script>

  <!-- Initialize Quill editor -->
  <script>
    var quill = new Quill('#editor', {
      theme: 'snow',
      modules: {
        toolbar: [
          [{ header: [1, 2, 3, 4, 5, false] }],
          ["bold"],
          ["italic"],
          ["link"],
          ["blockquote"],
          // ["image"],
          // ["link", "blockquote", "image"],
          [{ list: "ordered" }],
          [{ list: "bullet" }],
          [{ color: [] }],
          [{ background: [] }],
        ]
      },
    });
    quill.on('text-change', function (delta, oldDelta, source) {
      document.querySelector("textarea[name='isi']").value = quill.root.innerHTML;
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
  
  <script>
    new Tagin(document.querySelector('.tagin'))
  </script>
@endpush