@extends('panel/layout/template')

@section('title', 'Kebijakan Privasi')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Kebijakan</strong> Privasi</h1>
  </div>
</div>

@include('panel/komponen/alert')
<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/kebijakan-privasi/{{ $data->id }}">
      @method('PUT')
      @csrf
      <div class="mb-3">
        <label for="kebijakan_privasi">Deskripsi</label>
        <textarea name="kebijakan_privasi" id="kebijakan_privasi" class="form-control">{{ $data->kebijakan_privasi }}</textarea>
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