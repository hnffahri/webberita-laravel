@extends('panel/layout/template')

@section('title', 'User Admin')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>User</strong> Admin</h1>
  </div>
  <div class="col-6 text-end">
    <a href="{{ url('panel/user/create') }}" class="btn btn-primary"><i class="fal fa-plus-circle me-2"></i>Tambah</a>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <table class="table my-0 table-bordered">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Role</th>
          <th>Postingan</th>
          <th class="">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr>
          <td>
            <div class="d-none d-lg-inline-block">
              @if (empty($item->avatar))
              <img src="{{ asset('images/user.png') }}" alt="#" class="kotak rounded me-2 border" width="40">
              @else
              <img src="{{ asset('images/user/'.$item->avatar) }}" alt="#" class="kotak rounded me-2 border" width="40">
              @endif
            </div>
            {{ $item->name }}
          </td>
          <td>
            @if ($item->role == 1)
            Super Admin
            @else
            Admin
            @endif
          </td>
          <td>2023</td>
          <td class="">
            <div class="btn-group">
              @if ($item->role == 2)
              <a href="{{ url('panel/user/'.$item->id.'/edit') }}" class="btn btn-light"><i class="fal fa-edit"></i></a>
              <a href="#" onclick="deleteUser(this)" data-id="{{ $item->id }}" class="btn btn-light"><i class="fal fa-trash-alt"></i></a>
              <a href="{{ url('panel/user/'.$item->id) }}" class="btn btn-light"><i class="fal fa-eye"></i></a>
              @endif
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
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
  function deleteUser(e){
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
          url: "/panel/user/" + id,
          dataType: "json",
          success: function(response){
            Swal.fire({
              title: "Berhasil",
              text: response.message,
              icon: "success"
            }).then((result) => {
              window.location.href = '/panel/user';
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