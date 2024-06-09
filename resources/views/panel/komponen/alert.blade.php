@if ($errors->any())
<div class="alert alert-danger" role="alert">
  <ul class="mb-0 py-3">
    @foreach ($errors->all() as $item)
      <li>{{ $item }}</li>
    @endforeach
  </ul>
</div>
@endif

{{-- @if (Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif --}}