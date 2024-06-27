@extends('front/layout/template')

@section('title', 'Tentang Kami')

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row mb-4 justify-content-center">
        <div class="col-7 text-center">
          <h1 class="text-dark font m-0 d-inline-block">Tentang Kami</h1>
        </div>
      </div>
      {{ $data->tentang_kami }}
    </div>
  </div>
</main>

@endsection