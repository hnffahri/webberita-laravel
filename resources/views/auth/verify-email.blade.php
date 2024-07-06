@extends('front/layout/template')

@section('title', 'Daftar')

@section('content')

<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <p>Terima kasih telah mendaftar! Sebelum memulai, bisakah Anda memverifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan melalui email kepada Anda? Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan email lainnya. Mengirim ulang email verifikasi Keluar</p>

            @if(session('status') == 'verification-link-sent')
            <div class="alert alert-success">
              {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
            </div>
            @endif

            <div class="mt-4 d-flex align-items-center justify-content-between">
              <form method="POST" action="{{ route('verification.send') }}">
                @csrf
          
                <div>
                  <button class="btn btn-primary">
                    Resend Verification Email
                  </button>
                </div>
              </form>
          
              <form method="POST" action="{{ route('logout') }}">
                @csrf
          
                <button type="submit" class="btn btn-link text-dark">
                  Log Out
                </button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection