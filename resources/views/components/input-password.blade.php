<!-- resources/views/components/input.blade.php -->
@props(['id', 'name', 'type' => 'text', 'value' => '', 'placeholder' => '', 'errorBag' => 'default'])

<input id="{{ $id }}" class="form-control @error($name, $errorBag) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" />

@error($name, $errorBag)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
