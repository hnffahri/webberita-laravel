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

        <div class="mb-3 d-flex align-items-center">
            @if (empty($user->avatar))
            <img src="{{ asset('images/user.png') }}" alt="{{ $user->name }}" class="bulat rounded-2" width="65">
            @else
            <img src="{{ asset('images/'.$user->avatar) }}" alt="{{ $user->name }}" class="bulat rounded-2" width="65">
            @endif
            <div class="ms-2 w-100">
                <x-input-label for="avatar" :value="__('Avatar')" />
                <x-input id="avatar" class="" name="avatar" type="file" />
            </div>
        </div>

        <div class="mb-3">
            <x-input-label for="name" :value="__('Name')" />
            <x-input id="name" class="" name="name" type="text" autocomplete="name" value="{{ old('name', $user->name) }}" />
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

        <div class="d-flex align-items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

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
