@extends('panel/layout/template')

@section('title', 'Dashboard')

@section('content')

{{-- <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1> --}}
<div class="row">
  <div class="col-xl-3 col-6">
      <a href="{{ url('panel/konten') }}">
          <div class="card">
              <div class="card-body">
                  <div class="row align-items-start">
                      <div class="col">
                        <p>
                          Konten
                        </p>
                          <h1 class="m-0">{{ $kontenCount }}</h1>
                      </div>
                      <div class="col-auto">
                        <div class="stat text-primary">
                          <i class="bi bi-archive"></i>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </a>
  </div>
  <div class="col-xl-3 col-6">
      <a href="{{ url('panel/kategori') }}">
          <div class="card">
              <div class="card-body">
                  <div class="row align-items-start">
                      <div class="col">
                        <p>
                          Kategori
                        </p>
                          <h1 class="m-0">{{ $kategoriCount }}</h1>
                      </div>
                      <div class="col-auto">
                        <div class="stat text-primary">
                          <i class="bi bi-list-ol"></i>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </a>
  </div>
  <div class="col-xl-3 col-6">
      <a href="{{ url('panel/pesan') }}">
          <div class="card">
              <div class="card-body">
                  <div class="row align-items-start">
                      <div class="col">
                        <p>
                          Pesan
                        </p>
                          <h1 class="m-0">{{ $pesanCount }}</h1>
                      </div>
                      <div class="col-auto">
                        <div class="stat text-primary">
                          <i class="bi bi-chat-dots"></i>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </a>
  </div>
  <div class="col-xl-3 col-6">
      <a href="{{ url('panel/member') }}">
          <div class="card">
              <div class="card-body">
                  <div class="row align-items-start">
                      <div class="col">
                        <p>
                          Member
                        </p>
                          <h1 class="m-0">{{ $memberCount }}</h1>
                      </div>
                      <div class="col-auto">
                        <div class="stat text-primary">
                          <i class="bi bi-people"></i>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </a>
  </div>
</div>


<div class="card flex-fill w-100">
  <div class="card-header bg-primary">
    <h5 class="card-title mb-0 text-white">Member Baru</h5>
  </div>
  <div class="card-body py-3">
    <div class="chart chart-sm">
      <canvas id="chartjs-dashboard-line"></canvas>
    </div>
  </div>
</div>

<h1 class="h3 mb-3"><strong>Konten</strong> Trending</h1>
<div class="row">
  @forelse ($kontentrending as $item)
  <div class="col-lg-4">
    <div class="card">
      <a href="{{ url('panel/konten/'.$item->id) }}" class="text-muted">
        <img src="{{ asset('images/konten/'.$item->img) }}" alt="{{ $item->judul }}" class="w-100 banner card-img-top">
        <div class="card-body">
          <div class="mb-3 clearfix">
            <div class="float-start"><i class="bi bi-bookmark me-1"></i>{{ $item->kategori->nama }}</div>
            <div class="float-end">
              @if ($item->type == 1)
              <span class="badge bg-info">Artikel</span>
              @else
              <span class="badge bg-info">Vidio</span>
              @endif
            </div>
          </div>
          <h4 class="text-dark">
            {{ $item->judul }}
          </h4>
          <p>
            @if ($item->status == 1)
            <span class="badge me-2 bg-success">Aktif</span>
            @else
            <span class="badge me-2 bg-warning">Tidak Aktif</span>
            @endif
            {{ $item->views }} Views
            <span class="ms-2">{{ $item->likes->count() }} Like</span>
          </p>
          <p>
            <small><i class="bi bi-calendar3 me-1"></i>{{$item->created_at}}</small>
            <small class="ms-3"><i class="bi bi-person me-1"></i>{{ $item->admin->name }}</small>
          </p>
          <div class="card m-0">
            <div class="btn-group">
              <a href="{{ url('panel/konten/'.$item->id) }}" class="btn btn-light"><i class="bi bi-eye"></i></a>
              <a href="{{ url('panel/konten/'.$item->id.'/edit') }}" class="btn btn-light"><i class="bi bi-pencil-square"></i></a>
              <a href="#" onclick="deleteKonten(this)" data-id="{{ $item->id }}" class="btn btn-light"><i class="bi bi-trash"></i></a>
            </div>
          </div>
        </div>
      </a>
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

<div class="row align-items-center">
  <div class="col-8">
    <h1 class="h3 mb-3"><strong>Pesan</strong> Hari Ini</h1>
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
        <div class="fw-bold text-dark">Judul Pesan :</div>
        <h5 class="text-dark">{{ $item->judul_pesan }}</h5>
        <p><span class="fw-bold text-dark">Pesan</span> : {{ $item->pesan }}</p>
        <div><i class="bi bi-person me-1"></i>{{ $item->nama }}</div>
        <div><i class="bi bi-envelope me-1"></i>{{ $item->email }}</div>
        <i class="bi bi-calendar3 me-1"></i>{{ $item->created_at }}
      </div>
    </div>
  </div>
  @empty
  <div class="text-center mt-5">
    <img src="{{ asset('images/empty.svg') }}" alt="#" width="100">
    <div class="mt-4">Tidak ada pesan</div>
  </div>
  @endforelse
</div>
<div class="swal" data-swal="{{ session('error') }}"></div>

@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  const swal = $('.swal').data('swal');
  if(swal){
    Swal.fire({
      title: "Error",
      text: swal,
      icon: "error",
      showConfirmButton: false,
      timer: 2500
    });
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
    var gradient = ctx.createLinearGradient(0, 0, 0, 225);
    gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
    gradient.addColorStop(1, "rgba(215, 227, 244, 0)");

    var monthlyUserData = @json(array_values($monthlyUserData));
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    // Line chart
    new Chart(document.getElementById("chartjs-dashboard-line"), {
      type: "line",
      data: {
        labels: months,
        datasets: [{
          label: "Member Baru",
          fill: true,
          backgroundColor: gradient,
          borderColor: window.theme.primary,
          data: monthlyUserData
        }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        tooltips: {
          intersect: false
        },
        hover: {
          intersect: true
        },
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            reverse: true,
            gridLines: {
              color: "rgba(0,0,0,0.0)"
            }
          }],
          yAxes: [{
            ticks: {
              stepSize: 1
            },
            display: true,
            borderDash: [3, 3],
            gridLines: {
              color: "rgba(0,0,0,0.0)"
            }
          }]
        }
      }
    });
  });
  </script>
@endpush