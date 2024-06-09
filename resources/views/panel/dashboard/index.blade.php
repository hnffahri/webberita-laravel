@extends('panel/layout/template')

@section('title', 'Dashboard')

@section('content')

<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

<div class="row">
  <div class="col-xl-3 col-md-6">
    <a href="{{ url('panel/artikel') }}">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center mb-3">
            <div class="col">
              Artikel
            </div>
            <div class="col-auto">
              <i class="fal fa-file-alt"></i>
            </div>
          </div>
          <h1 class="m-0">2.382</h1>
        </div>
      </div>
    </a>
  </div>
  <div class="col-xl-3 col-md-6">
    <a href="{{ url('panel/kategori') }}">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center mb-3">
            <div class="col">
              Kategori
            </div>
            <div class="col-auto">
              <i class="fal fa-file-alt"></i>
            </div>
          </div>
          <h1 class="m-0">2.382</h1>
        </div>
      </div>
    </a>
  </div>
  <div class="col-xl-3 col-md-6">
    <a href="{{ url('panel/pesan') }}">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center mb-3">
            <div class="col">
              Pesan
            </div>
            <div class="col-auto">
              <i class="fal fa-file-alt"></i>
            </div>
          </div>
          <h1 class="m-0">2.382</h1>
        </div>
      </div>
    </a>
  </div>
  <div class="col-xl-3 col-md-6">
    <a href="{{ url('panel/member') }}">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center mb-3">
            <div class="col">
              Member
            </div>
            <div class="col-auto">
              <i class="fal fa-file-alt"></i>
            </div>
          </div>
          <h1 class="m-0">2.382</h1>
        </div>
      </div>
    </a>
  </div>
</div>

<div class="row">
  <div class="col-lg-8">
    <div class="position-sticky" style="top: 10rem;">
      <div class="card">
        <div class="card-header bg-primary">
          <h5 class="text-white mb-0">Postingan Trending</h5>
        </div>
        <div class="card-body">
          <table class="table my-0 table-bordered">
            <thead>
              <tr>
                <th>Judul</th>
                <th class="d-none d-lg-table-cell">View</th>
                <th class="d-none d-lg-table-cell">Penulis</th>
                <th class="">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Project Wombat</td>
                <td class="d-none d-lg-table-cell">2023</td>
                <td class="d-none d-lg-table-cell">Jamal</td>
                <td class="">
                  <a href="#" class="btn btn-light">Detail</a>
                </td>
              </tr>
              <tr>
                <td>Project Wombat</td>
                <td class="d-none d-lg-table-cell">2023</td>
                <td class="d-none d-lg-table-cell">Jamal</td>
                <td class="">
                  <a href="#" class="btn btn-light">Detail</a>
                </td>
              </tr>
              <tr>
                <td>Project Wombat</td>
                <td class="d-none d-lg-table-cell">2023</td>
                <td class="d-none d-lg-table-cell">Jamal</td>
                <td class="">
                  <a href="#" class="btn btn-light">Detail</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
  </div>
</div>

<div class="row align-items-center">
  <div class="col-8">
    <h4 class="text-dark mb-0">Pesan Hari Ini</h4>
  </div>
  <div class="col-4 text-end">
    <a href="{{ url('panel/pesan') }}" class="btn btn-primary">Lihat Semua</a>
  </div>
</div>

<div class="row mt-3">
  @forelse ($pesan as $item)
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div>Judul Pesan :</div>
        <h5 class="text-dark">{{ $item->judul_pesan }}</h5>
        <p>Pesan : {{ $item->pesan }}</p>
        <div><i class="fal fa-user me-2"></i>{{ $item->nama }}</div>
        <div><i class="fal fa-envelope me-2"></i>{{ $item->email }}</div>
        <i class="fal fa-calendar-alt me-2"></i>{{ $item->created_at }}
      </div>
    </div>
  </div>
  @empty
  <div class="col-12 text-center">
    Tidak ada pesan hari ini
  </div>
  @endforelse
</div>

@endsection