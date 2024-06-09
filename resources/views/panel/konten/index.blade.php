@extends('panel/layout/template')

@section('title', 'Konten')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>List</strong> Konten</h1>
  </div>
  <div class="col-6 text-end">
    <a href="{{ url('panel/konten/create') }}" class="btn btn-primary"><i class="fal fa-plus-circle me-2"></i>Tambah</a>
  </div>
</div>

<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <table class="table my-0 table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th class="d-none d-lg-table-cell">Kategori</th>
          <th>Type</th>
          <th class="d-none d-lg-table-cell">Tanggal Upload</th>
          <th class="">Status</th>
          <th class="d-none d-lg-table-cell">View</th>
          <th class="">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($konten as $item)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $item->judul }}</td>
          <td class="d-none d-lg-table-cell">
            {{ $item->kategori->nama }}
          </td>
          <td>
            @if ($item->type == 1)
            <span class="badge bg-info">Artikel</span>
            @else
            <span class="badge bg-info">Vidio</span>
            @endif
          </td>
          <td class="d-none d-lg-table-cell">{{ $item->created_at }}</td>
          <td>
            @if ($item->status == 1)
            <span class="badge bg-success">Aktif</span>
            @else
            <span class="badge bg-warning">Tidak Aktif</span>
            @endif
          </td>
          <td class="d-none d-lg-table-cell">{{ $item->views }}</td>
          <td>
            <div class="btn-group">
              <a href="{{ url('panel/konten/'.$item->id.'/edit') }}" class="btn btn-light"><i class="fal fa-edit"></i></a>
              <a href="#" onclick="deleteKonten(this)" data-id="{{ $item->id }}" class="btn btn-light"><i class="fal fa-trash-alt"></i></a>
              <a href="{{ url('panel/konten/'.$item->id) }}" class="btn btn-light"><i class="fal fa-eye"></i></a>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="8" class="text-center">Tidak ada konten</td>
        </tr>
        @endforelse
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
  function deleteKonten(e){
    let id = e.getAttribute('data-id');

    Swal.fire({
      title: "Hapus",
      text: "Yakin hapus kontent ini?!",
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
              icon: "success"
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