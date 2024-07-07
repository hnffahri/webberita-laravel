@extends('panel/layout/template')

@section('title', 'User Member')

@section('content')

<div class="row mb-3">
  <div class="col-12">
    <h1 class="h3 mb-0"><strong>User</strong> Member</h1>
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
            <th>Email</th>
            <th>Notif</th>
            <th>Verifikasi</th>
            {{-- <th>Tanggal</th> --}}
            <th class="">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($data as $item)
          <tr>
            <td class="">
              <div class="d-flex align-items-center">
                @if (empty($item->avatar))
                <img src="{{ asset('images/user.png') }}" alt="#" class="kotak rounded me-2 border" width="30">
                @else
                <img src="{{ asset('images/member/'.$item->avatar) }}" alt="#" class="kotak rounded me-2 border" width="30">
                @endif
                {{ $item->name }}
              </div>
            </td>
            <td>
              {{ $item->email }}
            </td>
            <td>
              @if ($item->notif == 2)
              <span class="badge fw-normal text-bg-success text-white">
                <i class="fal fa-check-circle"></i> Aktif
              </span>
              @else
              <span class="badge fw-normal text-bg-danger">
                <i class="fal fa-times-circle"></i> Tidak Aktif
              </span>
              @endif
            </td>
            <td>
              @if ($item->email_verified_at == null)
              <span class="badge fw-normal text-bg-danger">
                <i class="fal fa-times-circle"></i> Belum
              </span>
              @else
              <span class="badge fw-normal text-bg-success text-white">
                <i class="fal fa-check-circle"></i> Verifikasi
              </span>
              @endif
            </td>
            {{-- <td>
              {{ $item->created_at }}
            </td> --}}
            <td class="">
              <div class="btn-group">
                <a href="#" onclick="deletemember(this)" data-id="{{ $item->id }}" class="btn btn-light"><i class="fal fa-trash-alt"></i></a>
              </div>
            </td>
          </tr>
          @empty
          <tr >
            <td colspan="4" class="text-center py-5">
              <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
              <div class="mt-4">Tidak ada member</div>
            </td>
          </tr>
          @endforelse
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
  function deletemember(e){
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
          url: "/panel/member/" + id,
          dataType: "json",
          success: function(response){
            Swal.fire({
              title: "Berhasil",
              text: response.message,
              icon: "success"
            }).then((result) => {
              window.location.href = '/panel/member';
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