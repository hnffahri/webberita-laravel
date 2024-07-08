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
                          <i class="fal fa-file-alt"></i>
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
                          <i class="fal fa-list"></i>
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
                          <i class="fal fa-comments"></i>
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
                          <i class="fal fa-users"></i>
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
    <h5 class="card-title mb-0 text-white">User Registration</h5>
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
          <p class="m-0">
            <small><i class="fal fa-calendar-alt me-2"></i>{{$item->created_at}}</small>
            <small class="ms-3"><i class="fal fa-user me-2"></i>{{ $item->admin->name }}</small>
          </p>
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
        <div><i class="fal fa-user me-2"></i>{{ $item->nama }}</div>
        <div><i class="fal fa-envelope me-2"></i>{{ $item->email }}</div>
        <i class="fal fa-calendar-alt me-2"></i>{{ $item->created_at }}
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
      title: "Berhasil...",
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
          label: "User Registration",
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