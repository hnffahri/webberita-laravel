@extends('panel/layout/template')

@section('title', 'Profile')

@section('content')

@push('css')
<link href="{{ asset('css/quill.min.css') }}" rel="stylesheet" />
@endpush

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Setting</strong> Profile</h1>
  </div>
</div>

{{-- @include('panel/komponen/alert') --}}
<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <form method="POST" action="/panel/profile/{{ $data->id }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="mb-4">
        <label for="avatar" class="label-avatar d-flex align-items-center">
          @if (empty($data->avatar))
          <img src="{{ asset('images/user.png') }}" alt="avatar" id="imgavatar" width="40" class="rounded-3 border me-3 kotak"><h5 class="text-dark m-0 fw-semibold"><i class="bi bi-pencil-square me-2"></i>Ganti Avatar</h5>
          @else
          <img src="{{ asset('images/admin/'.$data->avatar) }}" alt="avatar" id="imgavatar" width="40" class="rounded-3 border me-3 kotak"><h5 class="text-dark m-0 fw-semibold"><i class="bi bi-pencil-square me-2"></i>Ganti Avatar</h5>
          @endif
        </label>
        <input type="file" class="form-control" id="avatar" name="avatar" hidden>
        <input type="text" class="form-control" id="oldavatar" hidden name="oldavatar" value="{{ $data->avatar }}">
      </div>
      <div class="row">

        <div class="mb-3 col-md-6">
          <label for="name">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $data->name) }}">
          @error('name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 col-md-6">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ $data->email }}" disabled>
        </div>
        <div class="mb-3 col-12">
          <label for="biografi">Biografi</label>
          <textarea class="form-control @error('biografi') is-invalid @enderror" id="biografi" name="biografi">{{ old('biografi', $data->biografi) }}</textarea>
          @error('biografi')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 col-md-6">
          <label for="provinsi">Provinsi</label>
          <select name="provinsi" id="provinsi" class="form-select @error('provinsi') is-invalid @enderror">
            <option value="" hidden>Pilih Provinsi</option>
          </select>
          @error('provinsi')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 col-md-6">
          <label for="kota">Kota</label>
          <select name="kota" id="kota" class="form-select @error('kota') is-invalid @enderror">
            <option value="" hidden>Pilih Kota</option>
          </select>
          @error('kota')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3 col-12">
          <label for="alamat">Alamat</label>
          <textarea class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat', $data->alamat) }}</textarea>
          @error('alamat')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="facebook">Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook', $data->facebook ?? '') }}">
            @error('facebook')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="xtwitter">Twitter</label>
            <input type="text" name="xtwitter" id="xtwitter" class="form-control @error('xtwitter') is-invalid @enderror" value="{{ old('xtwitter', $data->xtwitter ?? '') }}">
            @error('xtwitter')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="instagram">Instagram</label>
            <input type="text" name="instagram" id="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ old('instagram', $data->instagram ?? '') }}">
            @error('instagram')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="col-6">
          <div class="mb-3">
            <label for="youtube">Youtube</label>
            <input type="text" name="youtube" id="youtube" class="form-control @error('youtube') is-invalid @enderror" value="{{ old('youtube', $data->youtube ?? '') }}">
            @error('youtube')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
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
  
  <script>
  var avatar = document.getElementById("avatar");

  avatar.onchange = function(evt) {
    const [file] = avatar.files
    if (file) {
      imgavatar.src = URL.createObjectURL(file)
    }
  };
  </script>

  <script>
    $(document).ready(function() {
        // Load provinces on page load
        $.ajax({
            url: '/provinces',
            type: 'GET',
            success: function(data) {
                var provinceSelect = $('#provinsi');
                var selectedProvince = "{{ old('provinsi', $data->provinsi) }}"; // Mendapatkan nilai lama atau nilai dari database
                provinceSelect.empty();
                provinceSelect.append('<option value="" hidden>Pilih Provinsi</option>');
                data.forEach(function(province) {
                    var selected = province.code == selectedProvince ? 'selected' : '';
                    provinceSelect.append('<option value="' + province.code + '" ' + selected + '>' + province.name + '</option>');
                });
                if (selectedProvince) {
                    loadCities(selectedProvince); // Load cities if province is selected
                }
            }
        });

        // Load cities when province changes
        $('#provinsi').change(function() {
            var provinceId = $(this).val();
            loadCities(provinceId);
        });

        function loadCities(provinceId) {
            if (provinceId) {
                $.ajax({
                    url: '/cities/' + provinceId,
                    type: 'GET',
                    success: function(data) {
                        var citySelect = $('#kota');
                        var selectedCity = "{{ old('kota', $data->kota) }}"; // Mendapatkan nilai lama atau nilai dari database
                        citySelect.empty();
                        citySelect.append('<option value="" hidden>Pilih Kota</option>');
                        data.forEach(function(city) {
                            var selected = city.code == selectedCity ? 'selected' : '';
                            citySelect.append('<option value="' + city.code + '" ' + selected + '>' + city.name + '</option>');
                        });
                    }
                });
            } else {
                $('#kota').empty();
                $('#kota').append('<option value="" hidden>Pilih Kota</option>');
            }
        }
    });
  </script>
@endpush