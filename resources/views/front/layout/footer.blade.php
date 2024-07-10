
<footer class="bg-white">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-3 text-center d-none d-lg-block">
        <h3 class="text-dark">Company</h3>
        <a class="d-block mt-2" href="{{ route('fronttentang')}}">Tentang Kami</a>
        <a class="d-block mt-2" href="{{ route('kontak')}}">Kontak</a>
        <a class="d-block mt-2" href="{{ route('syaratketentuan')}}">Syarat Ketentuan</a>
        <a class="d-block mt-2" href="{{ route('kebijakanprivasi')}}">Kebijakan Privasi</a>
        <a class="d-block mt-2" href="{{ route('frontbantuan')}}">Bantuan (Faq)</a>
      </div>
      <div class="col-lg-5 text-center">
        <a href="{{ url('/') }}"><img src="{{ asset('images/'.$tentang->logo) }}" alt="#" height="50"></a>
        <div class="mt-3">
          {{ $seo->deskripsi }}
        </div>
      </div>
      <div class="col-lg-3 text-center d-lg-none my-4">
        <h3 class="text-dark">Company</h3>
        <a class="d-block mt-2" href="{{ route('fronttentang')}}">Tentang Kami</a>
        <a class="d-block mt-2" href="{{ route('kontak')}}">Kontak</a>
        <a class="d-block mt-2" href="{{ route('syaratketentuan')}}">Syarat Ketentuan</a>
        <a class="d-block mt-2" href="{{ route('kebijakanprivasi')}}">Kebijakan Privasi</a>
        <a class="d-block mt-2" href="{{ route('frontbantuan')}}">Bantuan (Faq)</a>
      </div>
      <div class="col-lg-3 text-center">
        <h3 class="text-dark">Follow Us</h3>
        <a class="d-block mt-2" target="_blank" href="{{ $sosmed->facebook }}">Facebook</a>
        <a class="d-block mt-2" target="_blank" href="{{ $sosmed->twitter }}">Twitter</a>
        <a class="d-block mt-2" target="_blank" href="{{ $sosmed->instagram }}">Instagram</a>
        <a class="d-block mt-2" target="_blank" href="{{ $sosmed->youtube }}">Youtube</a>
        <a class="d-block mt-2" target="_blank" href="{{ $sosmed->tiktok }}">Tiktok</a>
      </div>
    </div>
  </div>
  <div class="border-top py-3 bg-light text-center">
    <div class="container">Copyright © 2021 WebBerita</div>
  </div>
</footer>