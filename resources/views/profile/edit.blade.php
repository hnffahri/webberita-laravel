<x-app-layout>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-body mb-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="card card-body mb-4">
                    @include('profile.partials.update-password-form')
                </div>
                <div class="card card-body mb-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
