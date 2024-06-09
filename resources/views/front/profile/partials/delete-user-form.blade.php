<section class="space-y-6">
    <header>
        <h5 class="text-dark">
            {{ __('Delete Account') }}
        </h5>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Button trigger modal -->
    <x-danger-button type="button" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
        {{ __('Delete Account') }}
    </x-danger-button>
    
    <!-- Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')
            
                        <h5 class="text-dark">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h5>
            
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>
                        
                        <div class="mb-3">
                            <x-input-password id="password" name="password" type="password" autocomplete="new-password" placeholder="{{ __('Password') }}" error-bag="userDeletion"/>
                        </div>

                        <x-danger-button>{{ __('Delete Account') }}</x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@push('js')
@if ($errors->userDeletion->get('password'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteAccountModal = new bootstrap.Modal(document.getElementById('deleteAccountModal'), {});
        deleteAccountModal.show();
    });
</script>
@endif
@endpush