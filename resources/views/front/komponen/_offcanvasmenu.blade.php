

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body menu">
    <a href="index.html"><i class="fal fa-home-alt me-2"></i>Beranda</a>
    <a href="trending.html"><i class="fal fa-rocket me-2"></i>Trending</a>
    <a href="pemberitahuan.html"><i class="fal fa-bell me-2"></i>Pemberitahuan</a>
    <a href="masuk.html"><i class="fal fa-user me-2"></i>Masuk</a>
    <hr>
    @foreach ($kategorinav as $item)
    <a class="@if (Route::is('listkategori') && $kategori->slug == $item->slug) active @endif" href="{{ url('/'.$item->slug) }}">{{ $item->nama }}</a>
    @endforeach
    <hr>
    <a href="bantuan.html">Bantuan</a>
    <a href="tentang.html">Tentang</a>
    <a href="privasi.html">Kebijakan Privasi</a>
    <hr>
    <a href="detail.html"><i class="fab fa-facebook-f me-2"></i>Facebook</a>
    <a href="detail.html"><i class="fab fa-instagram me-2"></i>Instagram</a>
    <a href="detail.html"><i class="fab fa-twitter me-2"></i>Twitter</a>
    <a href="detail.html"><i class="fab fa-youtube me-2"></i>Youtube</a>
  </div>
</div>