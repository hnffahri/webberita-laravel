@extends('panel/layout/template')

@section('title', 'kategori · Panel')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <h1 class="h3 mb-0"><strong>Kategori</strong> Artikel</h1>
  </div>
  <div class="col-6 text-end">
    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary"><i class="fal fa-plus-circle me-2"></i>Tambah</a>
  </div>
</div>

@include('panel/kategori/create')
@include('panel/kategori/edit')
<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card flex-fill">
  <div class="card-body">
    <table class="table my-0 table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Warna</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($kategori as $item)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $item->nama }}</td>
          <td><span class="badge bg-success" style="background-color: {{ $item->warna }} !important">{{ $item->warna }}</span></td>
          <td>
            <div class="btn-group">
              <a class="btn btn-light" href="#">Edit</a>
              <a class="btn btn-light" href="#" onclick="deleteKategori(this)" data-id="{{ $item->id }}">Hapus</a>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="text-center">Tidak ada kategori</td>
        </tr>
        @endforelse
      </tbody>
    </table>
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
    
    // fungsi delete
    function deleteKategori(e){
      let id = e.getAttribute('data-id');

      Swal.fire({
        title: "Hapus",
        text: "Yakin hapus kategori ini?!",
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
            url: "/panel/kategori/" + id,
            dataType: "json",
            success: function(response){
              Swal.fire({
                title: "Berhasil",
                text: response.message,
                icon: "success"
              }).then((result) => {
                window.location.href = '/panel/kategori';
              })
            },error: function(xhr, ajaxOptions, thrownError) {
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
          });
        }
      })
    }

  </script>

  @if ($errors->any())
  <script>
      document.addEventListener('DOMContentLoaded', function () {
          var exampleModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});
          exampleModal.show();
      });
  </script>
  @endif
@endpush