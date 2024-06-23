@extends('panel/layout/template')

@section('title', 'Bantuan')

@section('content')

<div class="row mb-3 align-items-center">
  <div class="col-7">
    <h1 class="h3 mb-0"><strong>Bantuan</strong> (Faq)</h1>
  </div>
  <div class="col-5 text-end">
    <a href="{{ url('panel/bantuan/create') }}" class="btn btn-primary"><i class="fal fa-plus-circle me-2"></i>Tambah</a>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="row">
  @forelse ($bantuan as $item)
  <div class="col-lg-4">
    <div class="card card-body">
      <div>
        <h4 class="text-dark">
          {{ $item->judul }}
        </h4>
        <p>
          {{ $item->ringkas }}
        </p>
        <p>
          <small><i class="fal fa-calendar-alt me-2"></i>{{$item->created_at}}</small>
        </p>
      </div>
      <div class="btn-group">
        <a href="{{ url('panel/bantuan/'.$item->id) }}" class="btn btn-light"><i class="fal fa-eye"></i></a>
        <a href="{{ url('panel/bantuan/'.$item->id.'/edit') }}" class="btn btn-light"><i class="fal fa-edit"></i></a>
        <a href="#" onclick="deletebantuan(this)" data-id="{{ $item->id }}" class="btn btn-light"><i class="fal fa-trash-alt"></i></a>
      </div>
    </div>
  </div>
  @empty
  <div class="col-12">
    <div class="text-center mt-5">
      <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
      <div class="mt-4">Tidak ada bantuan (faq)</div>
    </div>
  </div>
  @endforelse
</div>
{{ $bantuan->onEachSide(0)->links() }}

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
    function deletebantuan(e){
      let id = e.getAttribute('data-id');

      Swal.fire({
        title: "Hapus",
        text: "Yakin hapus bantuan ini?!",
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
            url: "/panel/bantuan/" + id,
            dataType: "json",
            success: function(response){
              Swal.fire({
                title: "Berhasil",
                text: response.message,
                icon: "success",
                timer: 2500,
                showConfirmButton: false,
              }).then((result) => {
                window.location.href = '/panel/bantuan';
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