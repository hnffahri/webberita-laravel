<section>

  @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
  <div class="bg-light p-3 mb-3">
    <form id="send-verification" method="POST" action="{{ route('verification.send') }}" class="m-0 d-inline">
        @csrf
        <span>Alamat email Anda belum diverifikasi.</span>
        <button class="btn btn-link p-0 btn-sm" type="submit">
            {{ __('Klik di sini untuk mengirim ulang email verifikasi..') }}
        </button>
    </form>
    @if (session('status') === 'verification-link-sent')
        <p class="mt-2 mb-0 fw-semibold text-dark">
          <i class="far fa-info-circle me-2"></i>Tautan verifikasi baru telah dikirimkan ke alamat email Anda.
        </p>
    @endif
  </div>
  @endif


    <header>
        <h5 class="text-dark">Profile Information</h5>
        <p class="">Update your account's profile information and email address.</p>
    </header>
    <form method="post" action="{{ route('profile.update') }}" class="" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-3">
          <label for="avatar" class="label-avatar d-flex align-items-center">
            @if (empty($user->avatar))
            <img src="{{ asset('images/user.png') }}" alt="avatar" id="imgavatar" width="40" class="border me-3 bulat"><div class="text-dark m-0 fw-semibold"><i class="far fa-edit me-2"></i>Ganti Avatar</div>
            @else
            <img src="{{ asset('images/member/'.$user->avatar) }}" alt="avatar" id="imgavatar" width="40" class="border me-3 bulat"><div class="text-dark m-0 fw-semibold"><i class="far fa-edit me-2"></i>Ganti Avatar</div>
            @endif
          </label>
          <input type="file" class="form-control" id="avatar" name="avatar" hidden>
        </div>

        <div class="row">

          <div class="col-md-6 mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control" value="{{ old('name', $user->name) }}">
            @error('name')
            <div class="invalid-feedback">
              *{{ $message }}
            </div>
            @enderror
          </div>
  
          <div class="col-md-6 mb-3">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="@error('tanggal_lahir') is-invalid @enderror form-control" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
            @error('tanggal_lahir')
            <div class="invalid-feedback">
              *{{ $message }}
            </div>
            @enderror
          </div>
  
          <div class="col-md-6 mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="@error('username') is-invalid @enderror form-control" value="{{ old('username', $user->username) }}">
            @error('username')
            <div class="invalid-feedback">
              *{{ $message }}
            </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-input id="email" class="" name="email" type="email" autocomplete="email" value="{{ old('email', $user->email) }}" />
          </div>
  
          <div class="col-md-6 mb-3">
            <label for="whatsapp">Whatsapp</label>
            <input type="text" name="whatsapp" id="whatsapp" class="@error('whatsapp') is-invalid @enderror form-control" value="{{ old('whatsapp', $user->whatsapp) }}">
            @error('whatsapp')
            <div class="invalid-feedback">
              *{{ $message }}
            </div>
            @enderror
          </div>
  
          <div class="col-md-6 mb-3">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="@error('jenis_kelamin') is-invalid @enderror form-select">
              <option value="" hidden>Pilih Jenis Kelamin</option>
              <option value="1" @selected(old('jenis_kelamin', $user->jenis_kelamin) == '1')>Laki - Laki</option>
              <option value="2" @selected(old('jenis_kelamin', $user->jenis_kelamin) == '2')>Perempuan</option>
            </select>
            @error('jenis_kelamin')
            <div class="invalid-feedback">
              *{{ $message }}
            </div>
            @enderror
          </div>
  
          <div class="mb-3 col-12">
            <label for="alamat">Alamat</label>
            <textarea class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat', $user->alamat) }}</textarea>
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
  
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="notif" name="notif" value="2" @checked(old('notif', $user->notif) == '2')>
            <label class="form-check-label" for="notif">Kirim Notifikasi Ke Email</label>
        </div>

        <div class="d-flex align-items-center gap-4">
            <x-primary-button><i class="fal fa-save me-2"></i>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="small m-0"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>

@push('js')
  <script>
  var avatar = document.getElementById("avatar");

  avatar.onchange = function(evt) {
    const [file] = avatar.files
    if (file) {
      imgavatar.src = URL.createObjectURL(file)
    }
  };
  </script>
@endpush