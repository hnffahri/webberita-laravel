@extends('front/layout/templatedashboard')

@section('title', 'Profile')

@section('content')


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

{{-- <x-app-layout>

</x-app-layout> --}}
