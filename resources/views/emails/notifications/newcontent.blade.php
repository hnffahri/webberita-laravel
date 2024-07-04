@component('mail::message')
# Halo Folks!

Konten baru telah ditambahkan ke situs kami.

**Judul:** {{ $konten->judul }}

**Ringkasan:** {{ $konten->ringkas }}

**Gambar:**
<img src="{{ asset('images/konten/' . $konten->img) }}" alt="Image" style="width: 100%; max-width: 600px;">

@component('mail::button', ['url' => $url])
Lihat Konten
@endcomponent

Terima kasih telah menggunakan aplikasi kami!

@endcomponent
