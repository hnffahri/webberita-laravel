@extends('panel/layout/template')

@section('title', 'Google Analytics')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Google</strong> Analytics</h1>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/google-analytics/{{ $gganalytics->id }}">
      @method('PUT')
      @csrf
      <div class="mb-3">
        <label for="google_analytics">Link</label>
        <textarea name="google_analytics" id="google_analytics" class="@error('google_analytics') is-invalid @enderror form-control">{{ old('google_analytics', $gganalytics->google_analytics) }}</textarea>
        @error('google_analytics')
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