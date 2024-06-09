@extends('panel/layout/template')

@section('title', 'Facebook Pixel')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Facebook</strong> Pixel</h1>
  </div>
</div>

@include('panel/komponen/alert')
<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/facebook-pixel/{{ $fbpixel->id }}">
      @method('PUT')
      @csrf
      <div class="mb-3">
        <label for="facebook_pixel">Link</label>
        <textarea name="facebook_pixel" id="facebook_pixel" class="form-control">{{ $fbpixel->facebook_pixel }}</textarea>
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