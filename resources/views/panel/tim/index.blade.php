@extends('panel/layout/template')

@section('title', 'Tim')

@section('content')

<div class="row mb-3 align-items-center">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>List</strong> Tim</h1>
  </div>
  <div class="col-6 text-end">
    <a href="{{ url('panel/tim/create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i>Tambah</a>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>


<div class="row">
  @forelse ($data as $item)
  <div class="col-lg-4 col-md-6">
    <div class="card">
      <img src="{{ asset('images/tim/'.$item->avatar) }}" alt="{{ $item->nama }}" class="w-100 kotak card-img-top">
      <div class="card-body">
        <h4 class="text-dark">
          {{ $item->nama }}
        </h4>
        <p>
          <i class="icon bi bi-credit-card me-1"></i>{{$item->posisi}}
        </p>
        <h6>Sosmed :</h6>
        <a class="mt-2 text-muted" target="_blank" href="{{ url('/'.$item->facebook)}}"><i class="icon bi bi-facebook me-1"></i></a>
        <a class="mt-2 text-muted" target="_blank" href="{{ url('/'.$item->xtwitter)}}"><i class="icon bi bi-twitter me-1"></i></a>
        <a class="mt-2 text-muted" target="_blank" href="{{ url('/'.$item->instagram)}}"><i class="icon bi bi-instagram me-1"></i></a>
        <a class="mt-2 text-muted" target="_blank" href="{{ url('/'.$item->youtube)}}"><i class="icon bi bi-youtube me-1"></i></a>
        <div class="card m-0 mt-3">
          <div class="btn-group">
            <a href="{{ url('panel/tim/'.$item->id.'/edit') }}" class="btn btn-light"><i class="bi bi-pencil-square"></i></a>
            <a href="#" onclick="deletetim(this)" data-id="{{ $item->id }}" class="btn btn-light"><i class="bi bi-trash"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @empty
  <div class="col-12">
    <div class="text-center mt-5">
      <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
      <div class="mt-4">Tidak ada tim</div>
    </div>
  </div>
  @endforelse
</div>

{{ $data->onEachSide(0)->links() }}
  
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
    function deletetim(e){
      let id = e.getAttribute('data-id');

      Swal.fire({
        title: "Hapus",
        text: "Yakin hapus tim ini?!",
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
            url: "/panel/tim/" + id,
            dataType: "json",
            success: function(response){
              Swal.fire({
                title: "Berhasil",
                text: response.message,
                icon: "success",
                timer: 2500,
                showConfirmButton: false,
              }).then((result) => {
                window.location.href = '/panel/tim';
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