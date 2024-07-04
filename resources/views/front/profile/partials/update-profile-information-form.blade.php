<section>
    <header>
        <h5 class="text-dark">
            {{ __('Profile Information') }}
        </h5>

        <p class="">
            {{ __("Update your account's profile information and email address.") }}
        </p>
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


        <div class="mb-3">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control" value="{{ old('name', $user->name) }}">
          @error('name')
          <div class="invalid-feedback">
            *{{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-input id="email" class="" name="email" type="email" autocomplete="email" value="{{ old('email', $user->email) }}" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
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