@extends('front/layout/template')

@section('title', 'Syarat Ketentuan')

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row mb-4 justify-content-center">
        <div class="col-7 text-center">
          <h1 class="text-dark font m-0 d-inline-block">Syarat Ketentuan</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card card-body">
            {!! $data->syarat_ketentuan !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection