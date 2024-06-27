@extends('front/layout/template')

@section('title', 'Kebijakan Privasi')

@section('content')


<main>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="row mb-4 justify-content-center">
        <div class="col-7 text-center">
          <h1 class="text-dark font m-0 d-inline-block">Kebijakan Privasi</h1>
        </div>
      </div>
      {{ $data->kebijakan_privasi }}
    </div>
  </div>
</main>

@endsection