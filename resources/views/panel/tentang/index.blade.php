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

@include('panel/komponen/alert')
<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/tentang/{{ $data->id }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <input type="text" class="form-control" hidden id="oldlogo" value="{{ old('logo', $data->logo) }}" name="oldlogo">
      <div class="mb-3">
        <label for="logo">Logo</label>
        <input type="file" class="form-control" id="logo" name="logo">
      </div>
      <div class="mb-3">
        <label for="logo">Preview</label>
        <div>
          <img src="{{ asset('images/'.$data->logo) }}" alt="logo" height="80" class="p-3 border">
        </div>
      </div>
      <hr>
      <div class="mb-3">
        <label for="tentang_kami">Tentang Kami</label>
        <textarea required hidden name="tentang_kami">{!! $data->tentang_kami !!}</textarea>
        <div id="editor">
          {!! $data->tentang_kami !!}
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



  <!-- Include the Quill library -->
  <script src="{{ asset('js/quill.min.js') }}"></script>

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
          // [{ color: [] }, { background: [] }],
        ]
      },
    });
    quill.on('text-change', function (delta, oldDelta, source) {
      document.querySelector("textarea[name='tentang_kami']").value = quill.root.innerHTML;
    });
  </script>
  
@endpush