<section>
    <header>
        <h5 class="text-dark">
            {{ __('Update Password') }}
        </h5>

        <p class="">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="">
        @csrf
        @method('put')

        <div class="mb-3">
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-input-password id="current_password" name="current_password" type="password" autocomplete="current-password" error-bag="updatePassword"/>
        </div>

        <div class="mb-3">
            <x-input-label for="new_password" :value="__('New Password')" />
            <x-input-password id="new_password" name="password" type="password" autocomplete="new-password" error-bag="updatePassword"/>
        </div>

        <div class="mb-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-input-password id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" error-bag="updatePassword"/>
        </div>

        <div class="d-flex align-items-center gap-4">
            <x-primary-button><i class="fal fa-save me-2"></i>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="small m-0"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
