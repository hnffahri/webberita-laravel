

<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header d-block border-bottom">
    <form action="{{ route('cari') }}" method="GET" class="card search-canvas w-100 mb-3">
      <div class="d-flex align-items-center">
        <i class="bi bi-search"></i>
        <input type="search" name="query" id="query" class="form-control" placeholder="Ketik kata kunci...">
        <button type="submit" class="btn btn-dark">Cari</button>
      </div>
    </form>
    <p class="m-0">Trending :</p>
  </div>
  <div class="offcanvas-body small">
    @foreach ($trendingcari as $item)
    <div class="modal-konten">
      <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
        <div class="d-flex align-items-center">
          <div class="me-3 w-100">
            <h6 class="text-dark">
              {{ $item->judul }}
            </h6>
            <div class="post-meta">
              @if ($item->type == 2)
              <span class="post-vidio me-2"><i class="bi bi-play me-1"></i> Vidio</span>
              @endif
              <span class="post-date"><small>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</small></span>
            </div>
          </div>
          <img src="{{ asset('images/konten/'.$item->img) }}" alt="{{ $item->judul }}" class="bulat radius-10" width="60">
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>