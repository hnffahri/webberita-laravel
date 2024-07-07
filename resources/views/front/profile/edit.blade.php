@extends('front/layout/templatedashboard')

@section('title', 'Pengaturan')

@section('content')


<div class="swal" data-swal="{{ session('success') }}"></div>

<div class="card card-body mb-4">
    @include('front.profile.partials.update-profile-information-form')
</div>
<div class="card card-body mb-4">
    @include('front.profile.partials.update-password-form')
</div>
<div class="card card-body mb-4">
    @include('front.profile.partials.delete-user-form')
</div>

@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const swal = $('.swal').data('swal');
    if(swal){
      Swal.fire({
        title: "Berhasil...",
        text: swal,
        icon: "success",
        showConfirmButton: false,
        timer: 2500
      });
    }
</script>
@endpush