@extends('panel/layout/template')

@section('title', 'User Admin')

@section('content')

<div class="row mb-3 align-items-center">
  <div class="col-7">
    <h1 class="h3 mb-0"><strong>User</strong> Admin</h1>
  </div>
  <div class="col-5 text-end">
    <a href="{{ url('panel/admin/create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i>Tambah</a>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table my-0 table-bordered">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Postingan</th>
            <th class="">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <td class="">
              <div class="d-flex align-items-center">
                @if (empty($item->avatar))
                <img src="{{ asset('images/user.png') }}" alt="#" class="kotak rounded me-2 border" width="30">
                @else
                <img src="{{ asset('images/admin/'.$item->avatar) }}" alt="#" class="kotak rounded me-2 border" width="30">
                @endif
                {{ $item->name }}
              </div>
            </td>
            <td>
              {{ $item->konten_count }} Konten
            </td>
            <td class="">
              <div class="btn-group">
                <a href="{{ url('panel/admin/'.$item->id) }}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                @if ($item->role == 2)
                <a href="{{ url('panel/admin/'.$item->id.'/edit') }}" class="btn btn-light"><i class="bi bi-pencil-square"></i></a>
                <a href="#" onclick="deleteadmin(this)" data-id="{{ $item->id }}" class="btn btn-light"><i class="bi bi-trash"></i></a>
                @endif
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

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
  function deleteadmin(e){
    let id = e.getAttribute('data-id');

    Swal.fire({
      title: "Hapus",
      text: "Yakin hapus data ini?!",
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
          url: "/panel/admin/" + id,
          dataType: "json",
          success: function(response){
            Swal.fire({
              title: "Berhasil",
              text: response.message,
              icon: "success"
            }).then((result) => {
              window.location.href = '/panel/admin';
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