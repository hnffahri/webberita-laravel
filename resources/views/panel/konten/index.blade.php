@extends('panel/layout/template')

@section('title', 'Konten')

@section('content')

<div class="row mb-3 align-items-center">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>List</strong> Konten</h1>
  </div>
  <div class="col-6 text-end">
    <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-link text-dark"><i class="fal fa-filter me-2"></i>Filter</a>
    <a href="{{ url('panel/konten/create') }}" class="btn btn-primary"><i class="fal fa-plus-circle me-2"></i>Tambah</a>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="collapse" id="collapseExample">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('konten.search') }}" method="GET">
        <div class="row align-items-end">
          <div class="col-md-6 mb-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Cari judul...">
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-select">
              <option value="">Semua Type</option>
              <option value="1" @selected(old('type') == '1')>Artikel</option>
              <option value="2" @selected(old('type') == '2')>Vidio</option>
            </select>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <label for="kategori">Kategori</label>
            <select name="kategori_id" id="kategori" class=" form-select">
              <option value="">Semua Kategori</option>
              @foreach ($kategori as $item)
              <option value="{{ $item->id }}" @selected(old('kategori_id') == $item->id)>{{ $item->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-select">
              <option value="">Semua Status</option>
              <option value="1" @selected(old('status') == '1')>Aktif</option>
              <option value="2" @selected(old('status') == '2')>Tidak Aktif</option>
            </select>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <label for="admin">Penulis</label>
            <select name="admin_id" id="admin" class=" form-select">
              <option value="">Semua Penulis</option>
              @foreach ($admin as $item)
              <option value="{{ $item->id }}" @selected(old('admin_id') == $item->id)>{{ $item->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <label for="periode">Periode</label>
            <input type="month" name="periode" id="periode" class="form-control">
          </div>
          <div class="col-lg-3 col-md-6 mb-3">
            <button class="btn btn-light me-2" type="reset">Reset</button>
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="row">
  @forelse ($konten as $item)
  <div class="col-lg-4">
    <div class="card">
      <img src="{{ asset('images/konten/'.$item->img) }}" alt="{{ $item->judul }}" class="w-100 banner card-img-top">
      <div class="card-body">
        <p class="mb-1"><i class="fal fa-bookmark me-2"></i>{{ $item->kategori->nama }}</p>
        <h4 class="text-dark">
          {{ $item->judul }}
        </h4>
        <p>
          @if ($item->type == 1)
          <span class="badge bg-info">Artikel</span>
          @else
          <span class="badge bg-info">Vidio</span>
          @endif

          @if ($item->status == 1)
          <span class="badge mx-2 bg-success">Aktif</span>
          @else
          <span class="badge mx-2 bg-warning">Tidak Aktif</span>
          @endif
          {{ $item->views }} Views
        </p>
        <p>
          <small><i class="fal fa-calendar-alt me-2"></i>{{$item->created_at}}</small>
          <small class="ms-3"><i class="fal fa-user me-2"></i>{{ $item->admin->name }}</small>
        </p>
        <div class="card m-0">
          <div class="btn-group">
            <a href="{{ url('panel/konten/'.$item->id) }}" class="btn btn-light"><i class="fal fa-eye"></i></a>
            <a href="{{ url('panel/konten/'.$item->id.'/edit') }}" class="btn btn-light"><i class="fal fa-edit"></i></a>
            <a href="#" onclick="deleteKonten(this)" data-id="{{ $item->id }}" class="btn btn-light"><i class="fal fa-trash-alt"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @empty
  <div class="col-12">
    <div class="text-center mt-5">
      <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
      <div class="mt-4">Tidak ada konten</div>
    </div>
  </div>
  @endforelse
</div>

{{ $konten->onEachSide(0)->links() }}
  
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
  
  // fungsi delete
    function deleteKonten(e){
      let id = e.getAttribute('data-id');

      Swal.fire({
        title: "Hapus",
        text: "Yakin hapus konten ini?!",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal"
      }).then((result) => {
        if (result.value) {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "DELETE",
            url: "/panel/konten/" + id,
            dataType: "json",
            success: function(response){
              Swal.fire({
                title: "Berhasil",
                text: response.message,
                icon: "success",
                timer: 2500,
                showConfirmButton: false,
              }).then((result) => {
                window.location.href = '/panel/konten';
              })
            },error: function(xhr, ajaxOptions, thrownError) {
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
          });
        }
      })
    }
</script>
    
@endpush

@endsection