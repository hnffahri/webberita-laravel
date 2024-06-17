@extends('panel/layout/template')

@section('title', 'kategori · Panel')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Sosial</strong> Media</h1>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/sosial-media/{{ $sosmed->id }}">
      @method('PUT')
      @csrf
      <div class="row">
        <div class="col-6">
          <div class="mb-3">
            <label for="facebook">Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook', $sosmed->facebook) }}">
            @error('facebook')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="twitter">Twitter</label>
            <input type="text" name="twitter" id="twitter" class="form-control @error('twitter') is-invalid @enderror" value="{{ old('twitter', $sosmed->twitter) }}">
            @error('twitter')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="instagram">Instagram</label>
            <input type="text" name="instagram" id="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ old('instagram', $sosmed->instagram) }}">
            @error('instagram')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="tiktok">Tiktok</label>
            <input type="text" name="tiktok" id="tiktok" class="form-control @error('tiktok') is-invalid @enderror" value="{{ old('tiktok', $sosmed->tiktok) }}">
            @error('tiktok')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
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