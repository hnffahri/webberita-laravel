@extends('front/layout/template')

@section('title', 'Kontak Kami')

@section('content')


<main>
  
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h1 class="text-dark font d-inline-block">Kontak Kami</h1>
          <p>We provide production services for all types of advertising</p>
          <div class="mt-2"><i class="icon bg-white fal fa-phone me-2"></i>{{ $data->telephone }}</div>
          <div class="mt-2"><i class="icon bg-white fal fa-envelope me-2"></i>{{ $data->email }}</div>
          <div class="mt-2"><i class="icon bg-white fal fa-map-marker-alt me-2"></i>{{ $data->alamat }}</div>
        </div>
        <div class="col-lg-6">
          <div class="swal" data-swal="{{ session('success') }}"></div>
          <div class="card">
            <div class="card-body">
              <form method="POST" action="{{ route('kontak.store') }}">
                @csrf
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="@error('nama') is-invalid @enderror form-control" value="{{ old('nama') }}">
                    @error('nama')
                    <div class="invalid-feedback">
                      *{{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email">Email</label>
                    <input type="mail" name="email" id="email" class="@error('email') is-invalid @enderror form-control" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                      *{{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="mb-3">
                  <label for="judul_pesan">Judul Pesan</label>
                  <input type="text" name="judul_pesan" id="judul_pesan" class="@error('judul_pesan') is-invalid @enderror form-control" value="{{ old('judul_pesan') }}">
                  @error('judul_pesan')
                  <div class="invalid-feedback">
                    *{{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="pesan">Isi Pesan</label>
                  <textarea name="pesan" id="pesan" class="@error('pesan') is-invalid @enderror form-control">{{ old('pesan') }}</textarea>
                  @error('pesan')
                  <div class="invalid-feedback">
                    *{{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  {!! NoCaptcha::renderJs() !!}
                  {!! NoCaptcha::display() !!}
                  @error('g-recaptcha-response')
                  <div class="invalid-feedback d-block">
                    *{{ $message }}
                  </div>
                  @enderror
                </div>
                <button class="btn btn-primary" type="submit">Kirim Pesan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-5">
      <div class="card">
        <div class="card-body">
          <div class="ratio ratio-21x9">
            <iframe width="600" height="500" style="width:100%;" id="gmap_canvas" src="https://maps.google.com/maps?q={{ $data->gmap }}&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@push('js')

{{-- alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
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

@endsection