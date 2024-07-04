@php
    $logoUrl = \App\Models\Tentang::select('logo')->first()->logo;
@endphp

@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
<img src="{{ asset($logoUrl) }}" alt="{{ config('app.name') }}" style="height: 75px;">
</a>
</td>
</tr>
