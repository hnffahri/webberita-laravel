@extends('front/layout/template')

@section('title', $konten->judul)
@section('keywords', $konten->keyword)
@section('deskripsi', $konten->ringkas)
@section('author', $konten->Admin->name)

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <div class="post-meta mb-2 d-lg-none">
                <span class="post-category me-3" style="background-color: {{ $kategori->warna }} !important">
                    <i class="bi bi-bookmark me-1"></i>{{ $kategori->nama }}
                </span>
                <a href="{{ url('penulis/'.$konten->Admin->username) }}" class="small">
                    <i class="bi bi-person-circle me-1"></i>{{ $konten->Admin->name }}
                </a>
            </div>
            <h1 class="text-dark">{{ $konten->judul }}</h1>
            <div class="post-meta">
                <span class="d-none d-lg-inline me-3">
                    <span class="post-category me-3" style="background-color: {{ $kategori->warna }} !important">
                        <i class="bi bi-bookmark me-1"></i>{{ $kategori->nama }}
                    </span>
                    <a href="{{ url('penulis/'.$konten->Admin->username) }}" class="small">
                        <i class="bi bi-person-circle me-1"></i>{{ $konten->Admin->name }}
                    </a>
                </span>
                <small>
                    <i class="bi bi-calendar-week me-2"></i>{{ $konten->created_at->translatedFormat('d F Y') }}
                    <i class="bi bi-clock me-2 ms-2"></i>{{ $konten->created_at->format('H:i') }} WIB
                </small>
            </div>
            <div class="my-4">
                @if ($konten->type == 2)
                    <video class="vidio-detail" controls>
                        <source src="{{ asset('vidio/konten/'.$konten->vidio) }}" type="video/mp4">
                    </video>
                @else
                    <img src="{{ asset('images/konten/'.$konten->img) }}" alt="#" class="w-100">
                @endif
            </div>
            <div class="isi-konten">
                {!! $konten->isi !!}
            </div>
            <div class="mt-4" id="like-section">
                @if(Auth::check())
                    @if($konten->likes->contains('user_id', Auth::id()))
                        <button class="btn btn-primary like-unlike-btn" id="unlike-btn" data-id="{{ $konten->id }}">
                            <i class="bi bi-hand-thumbs-up me-2"></i><span class="btn-text">Unlike</span>
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        </button>
                    @else
                        <button class="btn btn-outline-light like-unlike-btn" id="like-btn" data-id="{{ $konten->id }}">
                            <i class="bi bi-hand-thumbs-up me-2"></i><span class="btn-text">Like</span>
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        </button>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light">
                        <i class="bi bi-hand-thumbs-up me-2"></i>Like
                    </a>
                @endif
                <span class="ms-2" id="likes-count">{{ $konten->likes->count() }} likes</span>
            </div>
            <div class="card card-body mt-4">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="sosmed">
                            Share :
                            <a href="https://api.whatsapp.com/send?text={{ url($kategori->slug) }}/{{ $konten->slug }}" class="ms-3 btn btn-dark" target="_blank"><i class="bi bi-whatsapp"></i></a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url($kategori->slug) }}/{{ $konten->slug }}" class="ms-3 btn btn-dark" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="https://twitter.com/intent/tweet?url={{ url($kategori->slug) }}/{{ $konten->slug }}&text=Check%20this%20out!" class="ms-3 btn btn-dark" target="_blank"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-dark font m-0" style="border-color: {{ $kategori->warna }} !important">Trending Di {{ $kategori->nama }}</h5>
                </div>
                <div class="">
                    @foreach ($trending as $item)
                        <div class="card-body border-top trending">
                            <a href="{{ url('/'.$kategori->slug.'/'.$item->slug) }}">
                                <div class="d-flex">
                                    <div class="number text-dark bg-light">{{ $loop->iteration }}</div>
                                    <div class="text">
                                        <div class="post-meta">
                                            @if ($item->type == 2)
                                                <span class="post-vidio me-2"><i class="bi bi-play me-1"></i> Vidio</span>
                                            @endif
                                        </div>
                                        <h5 class="text-dark">{{ $item->judul }}</h5>
                                        <div class="post-meta">
                                            <span class="post-date"><small>{{ $item->created_at->diffForHumans() }}</small></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body text-center">
                    <h5 class="text-dark">Follow Us</h5>
                    <p>Follow us on Social Network</p>
                    <div>
                        <a class="mt-2 mx-1" target="_blank" href="{{ $sosmed->facebook }}"><i class="icon bi bi-facebook"></i></a>
                        <a class="mt-2 mx-1" target="_blank" href="{{ $sosmed->twitter }}"><i class="icon bi bi-twitter"></i></a>
                        <a class="mt-2 mx-1" target="_blank" href="{{ $sosmed->instagram }}"><i class="icon bi bi-instagram"></i></a>
                        <a class="mt-2 mx-1" target="_blank" href="{{ $sosmed->youtube }}"><i class="icon bi bi-youtube"></i></a>
                        <a class="mt-2 mx-1" target="_blank" href="{{ $sosmed->tiktok }}"><i class="icon bi bi-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div>
  </div>
</main>
@endsection


@push('js')
    
<script>
$(document).ready(function () {
    const disableButton = (button) => {
        button.prop('disabled', true);
        button.find('.btn-text').addClass('d-none');
        button.find('.spinner-border').removeClass('d-none');
    };

    const enableButton = (button) => {
        button.prop('disabled', false);
        button.find('.btn-text').removeClass('d-none');
        button.find('.spinner-border').addClass('d-none');
    };

    const updateLikeSection = (kontenId, response, like) => {
        let buttonClass = like ? 'btn-primary' : 'btn-outline-light';
        let buttonText = like ? 'Unlike' : 'Like';
        let newButtonId = like ? 'unlike-btn' : 'like-btn';

        $('#like-section').html(`
            <button class="btn ` + buttonClass + ` like-unlike-btn" id="` + newButtonId + `" data-id="` + kontenId + `">
                <i class="bi bi-hand-thumbs-up me-2"></i><span class="btn-text">` + buttonText + `</span>
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
            </button>
            <span class="ms-2" id="likes-count">` + response.likes_count + ` likes</span>
        `);
    };

    $(document).on('click', '.like-unlike-btn', function () {
        let button = $(this);
        let kontenId = button.data('id');
        disableButton(button);

        let url = button.attr('id') === 'like-btn' ? '/konten/' + kontenId + '/like' : '/konten/' + kontenId + '/unlike';

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    let isLike = button.attr('id') === 'like-btn';
                    updateLikeSection(kontenId, response, isLike);
                }
                enableButton(button);
            },
            error: function () {
                enableButton(button);
            }
        });
    });
});
</script>
@endpush