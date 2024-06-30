@extends('front/layout/template')

@section('title', 'Bantuan - Faq')

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="text-center">
        <h1 class="text-dark m-0">Bantuan (Faq)</h1>
      </div>
      <div class="row">
        @foreach ($bantuan as $item)
        <div class="col-md-6 col-lg-4 mt-4">
          <a href="{{ url('bantuan/'.$item->slug) }}">
            <div class="card card-body faq h-100">
              <div class="d-flex">
                <div class="number text-dark bg-light">{{ ($bantuan->currentPage() - 1) * $bantuan->perPage() + $loop->iteration }}</div>
                <div class="text">
                  <h5 class="text-dark mb-1">
                    {{ $item->judul }}
                  </h5>
                  <div class="post-meta">
                    <span class="post-date"><small>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</small></span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
      <div class="paginate-custom mt-4">
        {{ $bantuan->onEachSide(0)->links() }}
      </div>
    </div>
  </div>
</main>

@endsection