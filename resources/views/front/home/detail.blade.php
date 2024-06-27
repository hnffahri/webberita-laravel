@extends('front/layout/template')

@section('title', $konten->judul)

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="post-meta mb-2 d-lg-none">
            <span class="post-category me-3" style="background-color: {{ $konten->kategori->warna }} !important"><i class="fal fa-bookmark me-1"></i>{{ $konten->kategori->nama }}</span><a href="{{ url('penulis/'.$konten->Admin->username) }}" class="small"><i class="fal fa-user me-1"></i>{{ $konten->Admin->name }}</a>
          </div>
          <h1 class="text-dark">{{ $konten->judul }}</h1>
          <div class="post-meta">
            <span class="d-none d-lg-inline me-3">
              <span class="post-category me-3" style="background-color: {{ $konten->kategori->warna }} !important"><i class="fal fa-bookmark me-1"></i>{{ $konten->kategori->nama }}</span><a href="{{ url('penulis/'.$konten->Admin->username) }}" class="small"><i class="fal fa-user me-1"></i>{{ $konten->Admin->name }}</a>
            </span>
            <small><i class="fal fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($konten->created_at)->translatedFormat('d F Y') }} <i class="fal fa-clock me-2 ms-2"></i>{{ \Carbon\Carbon::parse($konten->created_at)->format('H:i') }} WIB</small>
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
                <button class="btn-sm btn btn-primary like-unlike-btn" id="unlike-btn" data-id="{{ $konten->id }}">
                    <i class="fal fa-thumbs-up me-2"></i><span class="btn-text">Unlike</span>
                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                </button>
            @else
                <button class="btn-sm btn btn-light like-unlike-btn" id="like-btn" data-id="{{ $konten->id }}">
                    <i class="fal fa-thumbs-up me-2"></i><span class="btn-text">Like</span>
                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                </button>
            @endif
            @else
              <a href="{{ route('login') }}" class="btn-sm btn btn-light"><i class="fal fa-thumbs-up me-2"></i>Like</a>
            @endif
            <span class="small ms-2" id="likes-count">{{ $konten->likes->count() }} likes</span>
          </div>
          <div class="card card-body mt-4">
            <div class="row align-items-center">
              <div class="col-12">
                <div class="sosmed">
                  Share :
                  <a href="#" class="ms-3 btn-sm btn btn-dark"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="ms-3 btn-sm btn btn-dark"><i class="fab fa-twitter"></i></a>
                  <a href="#" class="ms-3 btn-sm btn btn-dark"><i class="fab fa-instagram"></i></a>
                  <a href="#" class="ms-3 btn-sm btn btn-dark"><i class="fab fa-youtube"></i></a>
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
                <a href="{{ url('/'.$item->kategori->slug.'/'.$item->slug) }}">
                  <div class="d-flex">
                    <div class="number">{{ $loop->iteration }}</div>
                    <div class="text">
                      <div class="post-meta">
                        @if ($item->type == 2)
                        <span class="post-vidio me-2"><i class="fal fa-play me-1"></i> Vidio</span>
                        @endif
                      </div>
                      <h5 class="text-dark">
                        {{ $item->judul }}
                      </h5>
                      <div class="post-meta">
                        <span class="post-date"><small>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</small></span>
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
                <a class="mt-2" href="#"><i class="icon fab fa-facebook-f me-2"></i></a>
                <a class="mt-2" href="#"><i class="icon fab fa-twitter me-2"></i></a>
                <a class="mt-2" href="#"><i class="icon fab fa-instagram me-2"></i></a>
                <a class="mt-2" href="#"><i class="icon fab fa-youtube me-2"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
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
        let buttonClass = like ? 'btn-primary' : 'btn-light';
        let buttonText = like ? 'Unlike' : 'Like';
        let newButtonId = like ? 'unlike-btn' : 'like-btn';

        $('#like-section').html(`
            <button class="btn-sm btn ` + buttonClass + ` like-unlike-btn" id="` + newButtonId + `" data-id="` + kontenId + `">
                <i class="fal fa-thumbs-up me-2"></i><span class="btn-text">` + buttonText + `</span>
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
            </button>
            <span class="small ms-2" id="likes-count">` + response.likes_count + ` likes</span>
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
@endsection