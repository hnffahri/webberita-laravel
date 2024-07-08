<section class="space-y-6">
    <header>
        <h5 class="text-dark">
            {{ __('Delete Account') }}
        </h5>

        <p class="mt-1">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Button trigger modal -->
    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
        <i class="bi bi-trash me-2"></i>{{ __('Delete Account') }}
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
            
                        <h5 class="text-dark">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h5>
            
                        <p class="mt-1">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>
                        
                        
                        <div class="mb-3">
                            <input id="password" type="password" class="form-control @error('password','userDeletion') is-invalid @enderror" name="password" placeholder="Password">
                            @error('password','userDeletion')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <button class="btn btn-danger"><i class="bi bi-trash me-2"></i>{{ __('Delete Account') }}</button>
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